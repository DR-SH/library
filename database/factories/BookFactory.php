<?php

use App\Book;
use Faker\Factory as Faker;

$factory->define(Book::class, function () {
    $faker = Faker::create('ru_RU');
    return [
        'title' => $faker->realText(20),
        'about' => $faker->realText(320),
        'genre_id' => App\Genre::all()->random()->id,
    ];
});
