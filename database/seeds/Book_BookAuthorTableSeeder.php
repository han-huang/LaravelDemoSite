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
        $author = BookAuthor::where('name', '約瑟夫．尤金．史迪格里茲(Joseph Eugene Stiglitz)')
                      ->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);

        $book = Book::where('isbn-13', 9789869410465)->firstOrFail();
        $author = BookAuthor::where('name', '羅傑．克勞利(Roger Crowley)')->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);

        $book = Book::where('isbn-13', 9789865880132)->firstOrFail();
        $author = BookAuthor::where('name', '布蘭登．山德森(Brandon Sanderson)')
                      ->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);

        $book = Book::where('isbn-13', 9789571068428)->firstOrFail();
        $author = BookAuthor::where('name', '米澤穗信(Honobu YONEZAWA)')->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);

        $book = Book::where('isbn-13', 9789864082537)->firstOrFail();
        $author = BookAuthor::where('name', 'Chichin-puipui旅座')->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);

        $book = Book::where('isbn-13', 9789869434119)->firstOrFail();
        $author = BookAuthor::where('name', '張國洋(Joe Chang)')
                      ->orWhere('name', '姚詩豪(Bryan Yao)')
                      ->select('id')->get()
                      ->pluck('id')->toArray();
        $book->bookauthors()->sync($author);

        $book = Book::where('isbn-13', 9789862355664)->firstOrFail();
        $author = BookAuthor::where('name', '中山繁信(Shigenobu Nakayama)')
                      ->orWhere('name', '長沖充(Mitsuru Nagaoki)')
                      ->orWhere('name', '杉本龍彥(Tatsuhiko Sugimoto)')
                      ->orWhere('name', '片岡菜苗子(Nanako Kataoka)')
                      ->select('id')->get()
                      ->pluck('id')->toArray();
        $book->bookauthors()->sync($author);

        $book = Book::where('isbn-13', 9789864060788)->firstOrFail();
        $author = BookAuthor::where('name', '周慕姿')->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);

        $book = Book::where('isbn-13', 9789864791545)->firstOrFail();
        $author = BookAuthor::where('name', '湯馬斯．佛里曼(Thomas Friedman)')
                      ->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);

        $book = Book::where('isbn-13', 9789573332756)->firstOrFail();
        $author = BookAuthor::where('name', '東野圭吾(Keigo Higashino)')->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);

        $book = Book::where('isbn-13', 9789573332824)->firstOrFail();
        $author = BookAuthor::where('name', '湊佳苗(湊かなえ)')->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);

        $book = Book::where('isbn-13', 9789869407663)->firstOrFail();
        $author = BookAuthor::where('name', '布蘭登．山德森(Brandon Sanderson)')
                      ->select('id')->firstOrFail();
        $array[0] = $author->id;
        $book->bookauthors()->sync($array);
    }
}
