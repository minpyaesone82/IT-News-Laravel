<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        "title" => $faker->text(rand(70,200)),
        "description" => $faker->text(rand(400,700)),
        "user_id" => User::all()->random()->id,
        "category_id" =>Category::all()->random()->id
    ];
});
