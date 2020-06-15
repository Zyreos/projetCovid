<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CategoryTableSeeder::class);
        //$this->call(RoleTableSeeder::class);
        //$this->call(ArticlesTableSeeder::class);
        //$this->call(UserSeeder::class);

        factory(App\Category::class, 3)->create()->each(function ($category) {
            $i = 3;
            while (--$i) {
                $category->articles()->save(factory(App\Article::class)->make());
            }
        });

        /*factory(App\Role::class, 4)->create()->each(function ($role) {
            $i = 4;
            while (--$i) {
                $role->users()->save(factory(App\User::class)->make());
            }
        });*/

        factory(App\Command::class,20)->create()->each(function ($command) {

            $j = 20;
            while (--$j) {
                //$command->deliveries()->save(factory(App\Delivery::class)->make());
                $command->statuses()->save(factory(App\Status::class)->make());
            }

            factory(App\Role::class, 4)->create()->each(function ($role) {
                $i = 4;
                while (--$i) {
                    $role->users()->save(factory(App\User::class)->make());
                }
            });

        });

    }
}
