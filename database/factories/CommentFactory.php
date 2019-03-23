<?php

use App\Comment;
use Faker\Factory as Faker;

$factory->define(Comment::class, function () {
    $faker = Faker::create('ru_RU');
    return [
        'message' => $faker->realText(80),
        'book_id' => App\Book::all()->random()->id,
        'user_id' => App\User::all()->random()->id,
    ];
});
