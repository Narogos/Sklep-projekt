<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pl_PL');

        for ($i = 1; $i <= 10; $i++)
        {
            DB::table('users')->insert([
                'name' => $faker->unique->firstName,
                'email' => $faker->unique->email,
                'password' => bcrypt('123'),
            ]);
        }
    }
}
