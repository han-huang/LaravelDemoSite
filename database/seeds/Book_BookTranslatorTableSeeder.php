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
        $translator = BookTranslator::where('name', '葉咨佑')->firstOrFail();

        $book->booktranslators()->sync(
            $translator->pluck('id')->toArray()
        );
    }
}
