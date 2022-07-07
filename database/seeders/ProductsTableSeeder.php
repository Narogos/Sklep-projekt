<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pl_PL');

        for ($i = 0; $i < 30; $i++)
        {
            DB::table('products')->insert([
                'name' => $faker->randomElement(array('product'.$i)),
                'slug' => $faker->randomElement(array('product'.$i)),
                'price' => $faker->numberBetween(1,2000),
                'quantity' => $faker->numberBetween(1,40),
                'description' => $faker->text(100),
                'image' => $faker->text(5),
                'category_id' => $faker->numberBetween(6,15)
            ]);
        }
    }
}
