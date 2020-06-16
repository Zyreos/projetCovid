<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Delivery;
use Faker\Generator as Faker;

$factory->define(Delivery::class, function (Faker $faker) {
    return [
        'mode' => $faker->state,
        'address1' => $faker->address,
        'address2' => $faker->optional()->address,
        'postcode' => $faker->numberBetween(0,200),
        'city' => $faker->city,
        'country' => $faker->country,
        'price' => $faker->numberBetween(3,69)
    ];
});
