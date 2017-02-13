<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsCategory;
use App\NewsPost;
use App\ClickCounter;
use DB;
use Log;

class NewsController extends Controller
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('clicktrack', ['only' => [
            'newsArticle',
        ]]);
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
        // $path = $request->route()->getName();
        // Log::info('newsIndex $path: '.$path." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // $offset = 0;
        // $limit = 10;
        // $newsposts = DB::table('news_posts')->select(['id', 'news_category_id', 'title', 'updated_at'])
                         // ->where('active', '=', 1)->where('status', '=', 'PUBLISHED')
                         // ->orderBy('updated_at', 'desc')->offset($offset)->limit($limit)->get();

        // $newspostsModel = new NewsPost();
        // $newsposts = $newspostsModel->selectbrief()
                         // ->active()->published()
                         // ->updatedtimedesc()->getlimit($offset, $limit)->get();
        // return $newsposts;
        
        $page = 1;
        // $limit = 5;
        // return $this->newsPage($request, $page, $limit);
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
        // $path = $request->route()->getName();
        // Log::info('newsIndex $path: '.$path." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        $limit = 30;

        //verify $page is an integer or not
        $match = preg_match("/^[1-9][0-9]*$/", $page); ;
        if (!$match) {
            // Log::info('!$match: '.$page." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return redirect()->route('news');
        }

        $offset = ($page - 1) * $limit;
        // Log::info('$page: '.$page." ".'$offset: '.$offset." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        $newspostsModel = new NewsPost();
        // $newsposts = $newspostsModel->selectbrief()
                         // ->active()->published()
                         // ->updatedtimedesc()->getlimit($offset, $limit)->get();

        // $newsposts = $newspostsModel->newspage($offset, $limit)->get();
        $newsposts = $newspostsModel->newsPostJoinNewsCategory($offset, $limit)->get();
        if (!count($newsposts)) {
            // Log::info('!count($newspost): '.count($newspost)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return redirect()->route('news');
        }

        $count = $newspostsModel->newscount();
        $pages = ($count % $limit) > 0 ? (intval($count / $limit) + 1)
                    : ($count / $limit);
        $start = ($page % 10) > 0 ? (floor($page / 10) * 10 + 1) : (($page / 10) - 1) * 10 + 1;
        $end = $pages > ($start + 9) ? ($start + 9) : $pages;
        // Log::info('$count: '.$count." ".', $pages: '.$pages." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // return $newsposts;
        // return compact('newsposts');
        // return compact('newsposts', 'pages', 'page');

        $newscategoryModel = new NewsCategory();
        $newscategories = $newscategoryModel->excludenullcolor()->get();
        // Log::info('$newscategoryModel->excludenullcolor '.__FILE__." ".__FUNCTION__." ".__LINE__);

        $view = 'site.news.news_index';
        // return compact('newsposts', 'newscategories', 'pages', 'page', 'start', 'end');
        return view($view, compact('newsposts', 'newscategories', 'pages', 'page', 'start', 'end'));
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
        // $path = $request->route()->getName();
        // Log::info('index $path: '.$path." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        // GET THE Str, e.g. 'sports', 'life', etc.
        // $str = $this->getStr($request);
        // Log::info('index $str: '.$str." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        // $offset = 0;
        // $limit = 10;
        // $newsposts = NewsCategory::where('str', '=', $str)->first()->newsPost->where('active', '=', 1);
        // $newsposts = $newsCategory->getNewsPostActive;
        // $newsposts = $newsCategory->getNewsPostIndexActivePublished;
        // $newsposts = $newsCategory->getNewsPostIndexActive;
        // $newsposts = $newsCategory->getNewsPostActivePublished;

        /* old */
        // $newsCategory = NewsCategory::where('str', '=', $str)->first();
        // $newsposts = $newsCategory->getNewsPostLimitIndexActivePublished($offset, $limit);       

        // Log::info('$newsposts: '.$newsposts." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // $view = 'site.news.category_index';

        // return view($view, compact('newsposts'));

        // return $newsposts;

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
        // Log::info('index $str: '.$str." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // return $page;

        //verify $page is an integer or not
        $match = preg_match("/^[1-9][0-9]*$/", $page);
        if (!$match) {
            // Log::info('!$match: '.$page." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return redirect()->route('news');
        }

        $limit = 30;
        $offset = ($page - 1) * $limit;
        // $newsposts = NewsCategory::where('str', '=', $str)->first()->newsPost->where('active', '=', 1);
        $newsCategory = NewsCategory::where('str', '=', $str)->first();
        // $newsposts = $newsCategory->getNewsPostActive; //Illuminate\Database\Eloquent\Collection
        // Log::info('$newsCategory->getNewsPostActive get_class($newsposts): '.get_class($newsposts)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // $newsposts = $newsCategory->getNewsPostActive(); //Illuminate\Database\Eloquent\Relations\HasMany
        // Log::info('$newsCategory->getNewsPostActive() get_class($newsposts): '.get_class($newsposts)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // $newsposts = $newsCategory->getNewsPostActive()->get(); //Illuminate\Database\Eloquent\Collection
        // Log::info('$newsCategory->getNewsPostActive()->get() get_class($newsposts): '.get_class($newsposts)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // $newsposts = $newsCategory->getNewsPostIndexActivePublished;
        $newsposts = $newsCategory->getNewsPostJoinNewsCategory($offset, $limit);
        // $newsposts = $newsCategory->getNewsPostIndexActive;
        // $newsposts = $newsCategory->getNewsPostActivePublished;
        // Log::info('$newsposts: '.$newsposts." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        if (!count($newsposts)) {
            // Log::info('!count($newspost): '.count($newspost)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return redirect()->route('news');
        }

        $count = $newsCategory->countNewsPostActivePublished();
        $pages = ($count % $limit) > 0 ? (intval($count / $limit) + 1)
                    : ($count / $limit);
        $start = ($page % 10) > 0 ? (floor($page / 10) * 10 + 1) : (($page / 10) - 1) * 10 + 1;
        $end = $pages > ($start + 9) ? ($start + 9) : $pages;
        // Log::info('$count: '.$count." ".', $pages: '.$pages." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        // $view = 'site.news.category_index';

        // return view($view, compact('newsposts'));
        // return $newsposts;

        // return compact('newsposts', 'pages', 'page');

        $newscategoryModel = new NewsCategory();
        $newscategories = $newscategoryModel->excludenullcolor()->get();
        // Log::info('$newscategoryModel->excludenullcolor '.__FILE__." ".__FUNCTION__." ".__LINE__);

        $view = 'site.news.news_index';
        // return compact('newsposts', 'newscategories', 'pages', 'page', 'start', 'end', 'str');
        return view($view, compact('newsposts', 'newscategories', 'pages', 'page', 'start', 'end', 'str'));
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
            // Log::info('!$match: $id: '.$id." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return redirect()->route('news');
        }

        // $newspost = NewsPost::where('id', '=', $id)->first();
        $newspostsModel = new NewsPost();
        // $newsposts = $newspostsModel->selectbrief()
                         // ->active()->published()
                         // ->updatedtimedesc()->getlimit($offset, $limit)->get();

        // $newspost = $newspostsModel->findid($id)
                         // ->active()->published()->get();

        // $newspost = $newspostsModel->newsarticle($id)->get();
        // Log::info('$newspost = $newspostsModel->newsarticle($id)->get(); get_class($newspost) :'.get_class($newspost)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        $newspost = $newspostsModel->newsarticle($id)->first();
        // Log::info('$newspost = $newspostsModel->newsarticle($id)->first(); get_class($newspost) :'.get_class($newspost)." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        if (!count($newspost)) {
            // Log::info('!count($newspost): '.count($newspost)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return redirect()->route('news');
        }

        $newscategoryModel = new NewsCategory();
        $newscategories = $newscategoryModel->excludenullcolor()->get();

        $view = 'site.news.news_article';
        return view($view, compact('newspost', 'newscategories'));
        // return compact('newspost', 'newscategories');
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
        // $path = $request->route()->getName();
        // Log::info('show $id '.$id." ".'$path: '.$path." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        // GET THE Str, e.g. 'sports', 'life', etc.
        $str = $this->getStr($request);
        // Log::info('show $id '.$id." ".'$str: '.$str." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        $newsCategory = NewsCategory::where('str', '=', $str)->first();
        $newspost = $newsCategory->getNewsPostActivePublishedId($id)->get();
        // Log::info('get_class($newspost) '.get_class($newspost)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // Log::info('count($newspost) '.count($newspost)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        if (!count($newspost)) {
            // Log::info('!count($newspost): '.count($newspost)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return redirect()->route('news.'.$str.'.index');
        }

        $view = 'site.news.news_content';

        // return view($view, compact('newspost'));
        return $newspost;
    }
}
