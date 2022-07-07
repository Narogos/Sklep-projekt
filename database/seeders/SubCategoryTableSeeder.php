<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->randomElement(array('SubCategory'.$i)),
                'slug' => $faker->randomElement(array('SubCategory'.$i)),
                'parent_id' => $faker->numberBetween(1, 5)
            ]);
        }
    }
}
