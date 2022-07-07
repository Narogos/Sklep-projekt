<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 5; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->randomElement(array('Category'.$i)),
                'slug' => $faker->randomElement(array('Category'.$i)),
            ]);
        }
    }
}
