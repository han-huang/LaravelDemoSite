<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\BookAuthor;

class Book_BookAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = Book::where('isbn-13', 9789864771875)->firstOrFail();
        $author = BookAuthor::where('name', '約瑟夫．尤金．史迪格里茲(Joseph Eugene Stiglitz)')->firstOrFail();

        $book->bookauthors()->sync(
            $author->pluck('id')->toArray()
        );
    }
}
