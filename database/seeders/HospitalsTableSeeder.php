<?php

namespace Database\Seeders;
use App\Models\hospital;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospitals = [
            ['name' => 'Asiri Surgical Hospital PLC', 'location' => 'Colombo', 'phone' => '(011) 452 4400'],
            ['name' => 'Cancer Institute - Maharagama', 'location' => 'Maharagama', 'phone' => '(011) 285 0252 - 53'],
            ['name' => 'Castle Street Hospital for Women', 'location' => 'Colombo', 'phone' => '(011) 269 6231 - 32'],
            ['name' => 'Central Hospital (Pvt) Ltd', 'location' => 'Colombo', 'phone' => '(011) 466 5500'],
            ['name' => 'Chest Hospital - WelisaraRagama', 'location' => 'Ragama', 'phone' => '(011) 295 8271'],
            ['name' => 'Colombo (North) - Ragama', 'location' => 'Ragama', 'phone' => '(011) 295 9261'],
            ['name' => 'Colombo (South) - Kalubowila', 'location' => 'Colombo', 'phone' => '(011) 276 3065'],
            ['name' => 'Colombo General Hospital (National)', 'location' => 'Colombo', 'phone' => '(011) 269 1111'],
            // Add more hospitals here
        ];
        foreach ($hospitals as $hospital) {
            hospital::create($hospital);
        }
    }
}
