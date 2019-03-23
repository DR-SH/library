<?php

use App\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Book::class, 20)->create()->each(function($book) {
            $book->authors()->attach(App\Author::all()->random()->id);
            $book->genres()->attach(App\Genre::all()->random()->id);
        });
    }
}
