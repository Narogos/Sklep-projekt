<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pl_PL');

        for ($i = 0; $i < 10; $i++)
        {
            DB::table('addresses')->insert([
                'country' => $faker->country,
                'city' => $faker->unique->city,
                'phone' => $faker->unique->numberBetween(1,1000),
                'street' => $faker->unique->streetName,
                'postcode' => $faker->unique->postcode,
                'house_number' => $faker->unique->numberBetween(1,1000)
            ]);
        }
    }
}
