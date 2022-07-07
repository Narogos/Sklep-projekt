<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 5; $i++)
        {
            DB::table('carts')->insert([
               'user_id' => $faker->unique->numberBetween(1,10),
               'product_id' => $faker->numberBetween(1,5)
            ]);
        }
    }
}
