<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;


class BookstoreController extends Controller
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('clicktrack', ['only' => [
            'book',
        ]]);
    }

    /**
     * Home of Bookstore
     *
     * @param  Request $request
     * @return
     */
    public function home(Request $request)
    {
        $bookModel = new Book();
        $newarrivals = $bookModel->newarrival()->get();
        $marketings = $bookModel->marketing()->get();
        $hits = $bookModel->hits()->get();
        $editors = $bookModel->editor()->get();
        $todaysale = $bookModel->selectprice()->discount(66)->first();
        $rankingnew = $bookModel->getRankingNew();
        $rankingsold = $bookModel->getRankingSold();
        $view = 'site.bookstore.home';
        return view($view, compact('newarrivals', 'marketings', 'hits', 'editors'
                   , 'todaysale', 'rankingnew', 'rankingsold'));
    }

    /**
     * go to Home of Bookstore
     *
     * @return
     */
    public function gohome()
    {
        return redirect()->route('bookstore.home');
    }

    /**
     * Show book information
     *
     * @param  Request $request
     * @param  $id
     * @return
     */
    public function book(Request $request, $id)
    {
        //verify $id
        $match = preg_match("/^[1-9][0-9]*$/", $id); ;
        if (!$match) {
            // Log::info('!$match: $id: '.$id." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return gohome();
        }

        $bookModel = new Book();
        // $book = $bookModel->active()->find($id);
        $book = $bookModel->getBook($id);

        if (!count($book)) {
            return gohome();
        }

        $current = array(
                       "id" => $book->id,
                       "title" => $book->title,
                       "image" => $book->image
                   );
        $name = "ckbooks";
        $browsed = $this->getBrowsedCookie($request, $book->id, $current, 10, $name);

        $randoms = $bookModel->getRandom(6);

        $authors = $book->bookauthors()->get();
        $translators = $book->booktranslators()->get();

        $view = 'site.bookstore.book';
        // return compact('book', 'authors', 'translators');
        // return view($view, compact('book', 'authors', 'translators', 'randoms'));
        return response()->view($view, compact('book', 'authors', 'translators', 'randoms', 'name'))
                   ->withCookie(cookie()->forever($name, $browsed));
    }

    /**
     * Get Cookie of Browsed record
     *
     * @param  Request $request
     * @param  integer $id
     * @param  array   $current
     * @param  integer $remain - remaining count
     * @param  string  $cname  - cookie name
     * @return array   $browsed
     */
    public function getBrowsedCookie(Request $request, $id, $current, $remain = 8, $cname = 'browsed')
    {
        $browsed = [];
        if ($cookie_data = $request->cookie($cname)) {

            $browsed = $cookie_data;
            $repeat = false;
            // Log::info('$cookie_data '.collect($cookie_data)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            foreach ($cookie_data as $data) {
                if(in_array($id, $data)) {
                    $repeat = true;
                    // Log::info('in_array '.__FILE__." ".__FUNCTION__." ".__LINE__);
                }
            }
            // if it's greater or equal to remaining count and no repeated record, remove the first record
            if (count($browsed) >= $remain && !$repeat) {
                // Log::info('before array_shift($browsed) '.'count($browsed): '.count($browsed).__FILE__." ".__FUNCTION__." ".__LINE__);
                array_shift($browsed);
                // Log::info('array_shift($browsed) '.'count($browsed): '.count($browsed).__FILE__." ".__FUNCTION__." ".__LINE__);
            }
            if (!$repeat) $browsed[] = $current;

        } else {
            $browsed[] = $current;
            // Log::info('else '." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        }
        // Log::info('$current: '.collect($current)." ".'count($browsed): '.count($browsed).' $browsed: '.collect($browsed)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        return $browsed;
    }
}
