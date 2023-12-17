<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// database/seeders/UsersTableSeeder.php

use Faker\Factory as FakerFactory;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 20000; $i++) {
            \DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), // Change this if needed
            ]);
        }
    }
}

