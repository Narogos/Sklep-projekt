<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 30; $i++)
        {
            DB::table('orders')->insert([
                'user_id' => $faker->numberBetween(1,10),
                'product_id' => $faker->numberBetween(1,20),
                'quantity' => $faker->numberBetween(1,10),
                'data_order' => $faker->dateTime(),
                'status' => $faker->numberBetween(0,1)
            ]);
        }
    }
}
