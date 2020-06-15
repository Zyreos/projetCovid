<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Command;

$factory->define(Command::class, function (Faker $faker) {
    return [

        'bill_address' => $faker-> address,
        'date_validation' => $faker->date(),

    ];
});
