<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsCategory;
use App\NewsPost;
use App\ClickCounter;
use DB;
use Log;
use EllipseSynergie\ApiResponse\Contracts\Response;

class NewsController extends Controller
{
    protected $response;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct(Response $response)
    {
        $this->middleware('clicktrack', ['only' => [
            'newsArticle',
            // 'newsArticleApi',
        ]]);

        $this->response = $response;
    }

    public function getStr(Request $request)
    {
        if (isset($this->str)) {
            $str = $this->str;
        } else {
            $str = explode('.', $request->route()->getName())[1];
        }

        return $str;
    }

    /**
     * display News Index
     * URI     news
     * Name    news
     *
     * @param  Request $request
     * @return 
     */
    public function newsIndex(Request $request)
    {
        $page = 1;
        return $this->newsPage($request, $page);
    }

    /**
     * display specific page of News Index
     * URI     news/page/{id}
     * Name    news.page
     *
     * @param  Request $request
     * @param  $page
     * @param  $limit
     * @return 
     */
    public function newsPage(Request $request, $page, $limit = 10)
    {
        $limit = 30;

        //verify $page is an integer or not
        $match = preg_match("/^[1-9][0-9]*$/", $page); ;
        if (!$match) {
            return redirect()->route('news');
        }

        $offset = ($page - 1) * $limit;
        $newspostsModel = new NewsPost();

        $newsposts = $newspostsModel->newsPostJoinNewsCategory($offset, $limit)->get();
        if (!count($newsposts)) {
            return redirect()->route('news');
        }

        $breakingnews = $newspostsModel->getBreakingnews()->get();
        $carousel = $newspostsModel->getCarousel()->get();

        $count = $newspostsModel->newscount();
        $pages = ($count % $limit) > 0 ? (intval($count / $limit) + 1)
                    : ($count / $limit);
        $start = ($page % 10) > 0 ? (floor($page / 10) * 10 + 1) : (($page / 10) - 1) * 10 + 1;
        $end = $pages > ($start + 9) ? ($start + 9) : $pages;

        $newscategoryModel = new NewsCategory();
        $newscategories = $newscategoryModel->excludenullcolor()->get();

        $view = 'site.news.news_index';
        return view($view, compact('newsposts', 'newscategories', 'pages',
                   'page', 'start', 'end', 'breakingnews', 'carousel'));
    }

    /**
     * display index of each category
     * URI     e.g. 'news/sports', 'news/tech', etc.
     * Name    e.g. 'news.sports.index', 'news.tech.index', etc.
     *
     * @param  Request $request
     * @return
     */
    public function index(Request $request)
    {
        $page = 1;
        return $this->show($request, $page);
    }

    /**
     * display specific page of each category
     * URI     e.g. 'news/sports/{sport} ', 'news/tech/{tech} ', etc.
     * Name    e.g. 'news.sports.page', 'news.tech.page', etc.
     *
     * @param  Request $request
     * @param  $page
     * @param  $limit
     * @return
     */
    public function show(Request $request, $page, $limit = 10)
    {
        // GET THE Str, e.g. 'sports', 'life', etc.
        $str = $this->getStr($request);

        //verify $page is an integer or not
        $match = preg_match("/^[1-9][0-9]*$/", $page);
        if (!$match) {
            return redirect()->route('news');
        }

        $limit = 30;
        $offset = ($page - 1) * $limit;

        $newsCategory = NewsCategory::where('str', '=', $str)->first();
        $newsposts = $newsCategory->getNewsPostJoinNewsCategory($offset, $limit);

        if (!count($newsposts)) {
            return redirect()->route('news');
        }

        $newspostsModel = new NewsPost();
        $breakingnews = $newspostsModel->getBreakingnews()->get();
        $carousel = $newspostsModel->getCarousel()->get();

        $count = $newsCategory->countNewsPostActivePublished();
        $pages = ($count % $limit) > 0 ? (intval($count / $limit) + 1)
                    : ($count / $limit);
        $start = ($page % 10) > 0 ? (floor($page / 10) * 10 + 1) : (($page / 10) - 1) * 10 + 1;
        $end = $pages > ($start + 9) ? ($start + 9) : $pages;

        $newscategoryModel = new NewsCategory();
        $newscategories = $newscategoryModel->excludenullcolor()->get();

        $view = 'site.news.news_index';
        return view($view, compact('newsposts', 'newscategories', 'pages',
                   'page', 'start', 'end', 'str', 'breakingnews', 'carousel'));
    }

    /**
     * display individual article
     * URI     'news/article/{id}'
     * Name    'news.article.content'
     *
     * @param  Request $request
     * @param  $id
     * @return
     */
    public function newsArticle(Request $request, $id)
    {
        //verify $id
        $match = preg_match("/^[1-9][0-9]*$/", $id); ;
        if (!$match) {
            return redirect()->route('news');
        }

        $newspostsModel = new NewsPost();
        $newspost = $newspostsModel->newsarticle($id)->first();
        if (!count($newspost)) {
            return redirect()->route('news');
        }

        $previous = $newspostsModel->getPrevious($newspost->updated_at)->first();
        $next = $newspostsModel->getNext($newspost->updated_at)->first();
        $latestnews = $newspostsModel->latestnews()->get();
        $brief = $newspostsModel->newsarticlebrief($id);
        $current = array(
                       "id" => $brief->id,
                       "title" => $brief->title
                   );

        $browsed = $this->getBrowsedCookie($request, $brief->id, $current);

        $newscategoryModel = new NewsCategory();
        $newscategories = $newscategoryModel->excludenullcolor()->get();

        $clickcounterModel = new ClickCounter();
        $urlcount = $clickcounterModel->getURLcount($request->path());

        $hotnews = $this->getHotNews();
        $view = 'site.news.news_article';
        return response()->view($view, compact('newspost', 'newscategories', 'urlcount', 'latestnews', 'hotnews', 'previous', 'next'))
                   ->withCookie(cookie()->forever('browsed', $browsed));
    }

    /**
     * display individual article for API
     * URI     'api/article/{id}'
     *
     * @param  Request $request
     * @param  $id
     * @return
     */
    public function newsArticleApi(Request $request, $id)
    {
        /* api/article/{id} */
        $match = preg_match("/^[1-9][0-9]*$/", $id); ;
        if (!$match) {
            return $this->response->errorNotFound('News Not Found');
        }

        $newspostsModel = new NewsPost();
        $newspost = $newspostsModel->newsarticle($id)->first();
        if (!count($newspost)) {
            // Log::info('!count($newspost): '.count($newspost)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return $this->response->errorNotFound('News Not Found');
        }

        $previous = $newspostsModel->getPrevious($newspost->updated_at)->first();
        $next = $newspostsModel->getNext($newspost->updated_at)->first();

        $clickcounterModel = new ClickCounter();
        $url = str_replace("api", "news", $request->path());
        $urlcount = $clickcounterModel->getURLcount($url);

        return compact('newspost', 'urlcount', 'previous', 'next');
    }

    /**
     * Get Hot News
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getHotNews()
    {
        $clickcounterModel = new ClickCounter();
        if ($clickcounterModel->count())
            $hotnews = $clickcounterModel->getHotNews()->get();
        else
            return null;

        //return null to fix Syntax error when click_counter has no news record but has book records
        if(empty($hotnews->count())) return null;

        $ids = array();
        foreach ($hotnews as $hot) {
            $url = explode("/", $hot->url);
            $ids[] = $url[2];
        }

        $newspostsModel = new NewsPost();
        $hit = $newspostsModel->getIDsnews($ids)->get();
        return $hit;
    }

    /**
     * Get Cookie of Browsed record
     *
     * @param  Request $request
     * @param  integer $id
     * @param  array   $current
     * @param  integer $remain - remaining count
     * @return array   $browsed
     */
    public function getBrowsedCookie(Request $request, $id, $current, $remain = 8)
    {
        $browsed = [];
        if ($cookie_data = $request->cookie('browsed')) {
            $browsed = $cookie_data;
            $repeat = false;
            foreach ($cookie_data as $data) {
                if(in_array($id, $data)) {
                    $repeat = true;
                }
            }
            // if it's greater or equal to remaining count and no repeated record, remove the first record
            if (count($browsed) >= $remain && !$repeat) {
                array_shift($browsed);
            }
            if (!$repeat) $browsed[] = $current;

        } else {
            $browsed[] = $current;
        }

        return $browsed;
    }

    /**
     * display individual article
     * URI     e.g. 'news/sports/{sport}', 'news/tech/{tech}', etc.
     * Name    e.g. 'news.sports.show', 'news.tech.show', etc.
     *
     * @param  Request $request
     * @param  $id
     * @return 
     */
    public function old_show(Request $request, $id)
    {
        // GET THE Str, e.g. 'sports', 'life', etc.
        $str = $this->getStr($request);

        $newsCategory = NewsCategory::where('str', '=', $str)->first();
        $newspost = $newsCategory->getNewsPostActivePublishedId($id)->get();

        if (!count($newspost)) {
            return redirect()->route('news.'.$str.'.index');
        }

        $view = 'site.news.news_content';
        return $newspost;
    }
}
