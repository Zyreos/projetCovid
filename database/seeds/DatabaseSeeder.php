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



        factory(App\Category::class, 5)->create()->each(function ($category) {
            $i = 3;
            while (--$i) {
                $category->articles()->save(factory(App\Article::class)->make());
            }
    });
    }
}
