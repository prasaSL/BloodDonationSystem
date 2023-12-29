<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define blood bank data
         $bloodBanks = [
            // Ampara Cluster
            [
                'b_name' => 'Akkaraipattu Blood Bank',
                'location' => 'Ampara',
                'phone' => '067 2277213',
            ],
            [
                'b_name' => 'Ampara Blood Bank',
                'location' => 'Ampara',
                'phone' => '063 2222261',
            ],
            [
                'b_name' => 'Dehiatthakandiya Blood Bank',
                'location' => 'Ampara',
                'phone' => '027 2250344',
            ],
            [
                'b_name' => 'Kalmunai AM(S) Blood Bank',
                'location' => 'Ampara',
                'phone' => '067 2222261',
            ],
            [
                'b_name' => 'Kalmunai Base(N) Blood Bank',
                'location' => 'Ampara',
                'phone' => '067 2229261',
            ],
            [
                'b_name' => 'Mahaoya Blood Bank',
                'location' => 'Ampara',
                'phone' => '063 2244061',
            ],
            [
                'b_name' => 'Sammanthurai Blood Bank',
                'location' => 'Ampara',
                'phone' => '067 2260261',
            ],

            // Anuradhapura Cluster
            [
                'b_name' => 'Anuradhapura Blood Bank',
                'location' => 'Anuradhapura',
                'phone' => '025 2222261-63',
            ],
            [
                'b_name' => 'Medirigiriya Blood Bank',
                'location' => 'Anuradhapura',
                'phone' => '027 2248261',
            ],
            [
                'b_name' => 'Padaviya Blood Bank',
                'location' => 'Anuradhapura',
                'phone' => '025 2253261',
            ],
            [
                'b_name' => 'Polonnaruwa Blood Bank',
                'location' => 'Anuradhapura',
                'phone' => '027 2222261',
            ],
            [
                'b_name' => 'Thambuttegama Blood Bank',
                'location' => 'Anuradhapura',
                'phone' => '025 2276262',
            ],

            // Badulla Cluster
            [
                'b_name' => 'Badulla Blood Bank',
                'location' => 'Badulla',
                'phone' => '055 2222261-62',
            ],
            [
                'b_name' => 'Bibila Blood Bank',
                'location' => 'Badulla',
                'phone' => '055 2265461',
            ],
            [
                'b_name' => 'Diyatalawa Blood Bank',
                'location' => 'Badulla',
                'phone' => '057 2229061',
            ],
            [
                'b_name' => 'Mahiyanganaya Blood Bank',
                'location' => 'Badulla',
                'phone' => '055 2257261',
            ],
            [
                'b_name' => 'Monaragala Blood Bank',
                'location' => 'Badulla',
                'phone' => '055 2276261',
            ],
            [
                'b_name' => 'Welimada Blood Bank',
                'location' => 'Badulla',
                'phone' => '057 2245161',
            ],
            [
                'b_name' => 'Wellawaya Blood Bank',
                'location' => 'Badulla',
                'phone' => '055 2274861',
            ],

            // Batticaloa Cluster
            [
                'b_name' => 'Batticaloa Blood Bank',
                'location' => 'Batticoloa',
                'phone' => '065 2222261-62',
            ],
            [
                'b_name' => 'Valachchenai Blood Bank',
                'location' => 'Batticoloa',
                'phone' => '065 2257721',
            ],

            // CIM Cluster
            [
                'b_name' => 'Avissawella Blood Bank',
                'location' => 'CIM',
                'phone' => '036 2222261-62',
            ],
            [
                'b_name' => 'CIM Blood Bank',
                'location' => 'CIM',
                'phone' => '011 2850252-53',
            ],
            [
                'b_name' => 'Homagama Blood Bank',
                'location' => 'CIM',
                'phone' => '011 2855200',
            ],
            [
                'b_name' => 'Karawenella Blood Bank',
                'location' => 'CIM',
                'phone' => '036 2267374',
            ],

            // CNTH Cluster
            [
                'b_name' => 'Chilaw Blood Bank',
                'location' => 'CNTH',
                'phone' => '032 2222261',
            ],
            [
                'b_name' => 'CNTH Blood Bank',
                'location' => 'CNTH',
                'phone' => '011 2959261-65',
            ],
            [
                'b_name' => 'Gampaha Blood Bank',
                'location' => 'CNTH',
                'phone' => '033 2222261-62',
            ],
            [
                'b_name' => 'Kalpitiya* Blood Bank',
                'location' => 'CNTH',
                'phone' => '032 2260261',
            ],
            [
                'b_name' => 'Marawila Blood Bank',
                'location' => 'CNTH',
                'phone' => '032 2254261',
            ],
            [
                'b_name' => 'Negambo Blood Bank',
                'location' => 'CNTH',
                'phone' => '033 2222261-62',
            ],
            [
                'b_name' => 'Puttalam Blood Bank',
                'location' => 'CNTH',
                'phone' => '032 2265261',
            ],
            [
                'b_name' => 'Wathupitiwala Blood Bank',
                'location' => 'CNTH',
                'phone' => '033 2280261-62',
            ],
            [
                'b_name' => 'Welisara Blood Bank',
                'location' => 'CNTH',
                'phone' => '011 2958271',
            ],

            // Jaffna Cluster
            [
                'b_name' => 'Jaffna Blood Bank',
                'location' => 'Jaffna',
                'phone' => '021 2222261',
            ],
            [
                'b_name' => 'Killinochchi Blood Bank',
                'location' => 'Jaffna',
                'phone' => '021 2285327',
            ],
            [
                'b_name' => 'Mullaitivu Blood Bank',
                'location' => 'Jaffna',
                'phone' => '024 3248436',
            ],
            [
                'b_name' => 'Point Pedro Blood Bank',
                'location' => 'Jaffna',
                'phone' => '021 226 3261',
            ],
            [
                'b_name' => 'Thellippallai Blood Bank',
                'location' => 'Jaffna',
                'phone' => '021 321 2614',
            ],

            // Kalutara Cluster
            [
                'b_name' => 'Horana Blood Bank',
                'location' => 'Kalutara',
                'phone' => '034 2261261',
            ],
            [
                'b_name' => 'Kalutara Blood Bank',
                'location' => 'Kalutara',
                'phone' => '034 2229129',
            ],
            [
                'b_name' => 'Kethumathie Blood Bank',
                'location' => 'Kalutara',
                'phone' => '038 2232361',
            ],
            [
                'b_name' => 'Panadura Blood Bank',
                'location' => 'Kalutara',
                'phone' => '038 2232261-62',
            ],

            // Kamburugamuwa Cluster
            [
                'b_name' => 'Hambanthota Blood Bank',
                'location' => 'Kamburugamuwa',
                'phone' => '047 2222016',
            ],
            [
                'b_name' => 'Kamburugamuwa Blood Bank',
                'location' => 'Kamburugamuwa',
                'phone' => '0412227232',
            ],
            [
                'b_name' => 'Kamburupitiya Blood Bank',
                'location' => 'Kamburugamuwa',
                'phone' => '041 2292261',
            ],
            [
                'b_name' => 'Matara Blood Bank',
                'location' => 'Kamburugamuwa',
                'phone' => '041 2222261-63',
            ],
            [
                'b_name' => 'Tangalle Blood Bank',
                'location' => 'Kamburugamuwa',
                'phone' => '047 2240261',
            ],
            [
                'b_name' => 'Thissamaharama Blood Bank',
                'location' => 'Kamburugamuwa',
                'phone' => '047 2237261',
            ],

            // Kandy Cluster
            [
                'b_name' => 'Dambulla Blood Bank',
                'location' => 'Kandy',
                'phone' => '066 2284761',
            ],
            [
                'b_name' => 'Dikkoya Blood Bank',
                'location' => 'Kandy',
                'phone' => '051 2230261',
            ],
            [
                'b_name' => 'Gampola Blood Bank',
                'location' => 'Kandy',
                'phone' => '081 2352261',
            ],
            [
                'b_name' => 'Kandy Blood Bank',
                'location' => 'Kandy',
                'phone' => '081 2233337-42',
            ],
            [
                'b_name' => 'Kegalle Blood Bank',
                'location' => 'Kandy',
                'phone' => '035 2222261-63',
            ],
            [
                'b_name' => 'Matale Blood Bank',
                'location' => 'Kandy',
                'phone' => '066 2222261',
            ],
            [
                'b_name' => 'Mawanella Blood Bank',
                'location' => 'Kandy',
                'phone' => '035 2246278',
            ],
            [
                'b_name' => 'Nawalapitiya Blood Bank',
                'location' => 'Kandy',
                'phone' => '054 2222261',
            ],
            [
                'b_name' => 'NuwaraEliya Blood Bank',
                'location' => 'Kandy',
                'phone' => '052 2222261',
            ],
            [
                'b_name' => 'Peradeniya Blood Bank',
                'location' => 'Kandy',
                'phone' => '081 2388001-07',
            ],
            [
                'b_name' => 'Rikillagaskada Blood Bank',
                'location' => 'Kandy',
                'phone' => '081 2365261',
            ],
            [
                'b_name' => 'Warakapola Blood Bank',
                'location' => 'Kandy',
                'phone' => '035 2267261',
            ],

            // Karapitiya Cluster
            [
                'b_name' => 'Balapitiya Blood Bank',
                'location' => 'Karapitiya',
                'phone' => '091 2258261',]];
            // Remove the extra closing square bracket

        // Insert data into the blood_banks table
        foreach ($bloodBanks as $bloodBank) {
            DB::table('blood_banks')->insert($bloodBank);
        }
    }
}
