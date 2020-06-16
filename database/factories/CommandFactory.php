<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Command;

$factory->define(Command::class, function (Faker $faker) {
    return [

        'bill_address' => $faker-> address,
        'date_validation' => $faker->date(),
        'total_definitive' => $faker->numberBetween(69,369),
        'user_id' => factory(App\Role::class, 4)->create()->each(function ($role) {
            $i = 4;
            while (--$i) {
                $role->users()->save(factory(App\User::class)->make());

            }
        }),
        //'user_id' => factory(\App\User::class),
        'status_id' => factory(App\Status::class),
        'delivery_id' => factory(App\Delivery::class)

    ];
});
