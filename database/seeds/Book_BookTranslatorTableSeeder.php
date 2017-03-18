<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\BookTranslator;

class Book_BookTranslatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = Book::where('isbn-13', 9789864771875)->firstOrFail();
        $translator = BookTranslator::where('name', '葉咨佑')->select('id')->firstOrFail();
        $array[0] = $translator->id;
        $book->booktranslators()->sync($array);

        $book = Book::where('isbn-13', 9789869410465)->firstOrFail();
        $translator = BookTranslator::where('name', '陸大鵬')
                          ->orWhere('name', '張騁')
                          ->select('id')->get()
                          ->pluck('id')->toArray();
        $book->booktranslators()->sync($translator);

        $book = Book::where('isbn-13', 9789865880132)->firstOrFail();
        $translator = BookTranslator::where('name', '段宗忱')->select('id')->firstOrFail();
        $array[0] = $translator->id;
        $book->booktranslators()->sync($array);

        $book = Book::where('isbn-13', 9789571068428)->firstOrFail();
        $translator = BookTranslator::where('name', '黃涓芳')->select('id')->firstOrFail();
        $array[0] = $translator->id;
        $book->booktranslators()->sync($array);

        $book = Book::where('isbn-13', 9789864082537)->firstOrFail();
        $translator = BookTranslator::where('name', '蔡孟汝')->select('id')->firstOrFail();
        $array[0] = $translator->id;
        $book->booktranslators()->sync($array);

        $book = Book::where('isbn-13', 9789862355664)->firstOrFail();
        $translator = BookTranslator::where('name', '林書嫻')->select('id')->firstOrFail();
        $array[0] = $translator->id;
        $book->booktranslators()->sync($array);

        $book = Book::where('isbn-13', 9789864791545)->firstOrFail();
        $translator = BookTranslator::where('name', '廖月娟')
                          ->orWhere('name', '李芳齡')
                          ->select('id')->get()
                          ->pluck('id')->toArray();
        $book->booktranslators()->sync($translator);

        $book = Book::where('isbn-13', 9789573332756)->firstOrFail();
        $translator = BookTranslator::where('name', '王蘊潔')->select('id')->firstOrFail();
        $array[0] = $translator->id;
        $book->booktranslators()->sync($array);

        $book = Book::where('isbn-13', 9789573332824)->firstOrFail();
        $translator = BookTranslator::where('name', '王蘊潔')->select('id')->firstOrFail();
        $array[0] = $translator->id;
        $book->booktranslators()->sync($array);

        $book = Book::where('isbn-13', 9789869407663)->firstOrFail();
        $translator = BookTranslator::where('name', '李玉蘭')
                          ->orWhere('name', '李鐳')
                          ->orWhere('name', '周翰廷')
                          ->orWhere('name', '陳錦慧')
                          ->orWhere('name', '聞若婷')
                          ->select('id')->get()
                          ->pluck('id')->toArray();
        $book->booktranslators()->sync($translator);
    }
}
