<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Article as Article;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'price' => $faker->numberBetween(50, 150),
        'description' => $faker->text,
        'dimensions' => $faker->shuffleString(10),
        //'category_id' => factory(App\Category::class),
    ];
});
