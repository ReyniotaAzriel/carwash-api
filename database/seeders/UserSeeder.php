<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), // Menggunakan bcrypt untuk mengenkripsi password
                'phone_number' => $faker->phoneNumber,
            ]);
        }
    }
}
