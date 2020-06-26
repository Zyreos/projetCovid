<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'first_name'=> $faker->firstName,
        'last_name' =>  $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'address1' => $faker->address,
        'address2' => $faker->optional()->address,
        'postcode' => $faker->numberBetween(0,200),
        'city' => $faker->city,
        'country' => $faker->country,
        'is_bill' => $faker->boolean
    ];
});
