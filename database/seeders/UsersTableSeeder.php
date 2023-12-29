<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $roles = ['administrator', 'donor', 'hospital_staff', 'blood_bank_staff', 'lab_technician', 'recipient', 'volunteer_coordinator', 'dispatcher', 'auditor'];

        for ($i = 1; $i <= 10; $i++) {
            $role = $roles[array_rand($roles)];

            DB::table('users')->insert([
                'Fname' => $faker->firstName,
                'Lname' => $faker->lastName,
                'national_id' => $faker->unique()->numerify('#############'), // Adjust the format as needed
                'date_of_birth' => $faker->dateTimeBetween('-35 years', '-18 years')->format('Y-m-d'),
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'blood_type' => $faker->randomElement(['A', 'B', 'AB', 'O']).$faker->randomDigit,
                'health_history' => $faker->sentence,
                'last_donation_date' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
               
                'address' => $faker->address,
                'location' => $faker->city,
                'password' => Hash::make('password'),
                'role' => $role,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
