<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;


class BookstoreController extends Controller
{
    /**
     * Home of Bookstore
     *
     * @param  Request $request
     * @return
     */
    public function home(Request $request)
    {
        
        $view = 'site.bookstore.home';
        return view($view);
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

        $authors = $book->bookauthors()->get();
        $translators = $book->booktranslators()->get();

        $view = 'site.bookstore.book';
        // return compact('book', 'authors', 'translators');
        return view($view, compact('book', 'authors', 'translators'));
    }
}
