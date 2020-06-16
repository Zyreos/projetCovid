<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'address1' => $faker->address,
        'address2' => $faker->optional()->address,
        'postcode' => $faker->numberBetween(0,200),
        'city' => $faker->city,
        'country' => $faker->country,
    ];
});
