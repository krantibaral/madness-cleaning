<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarpetCleaningService;

class CarpetCleaningServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create multiple entries
        CarpetCleaningService::create([
            'name' => 'John Doe',
            'phone' => '123-456-7890',
            'email' => 'johndoe@example.com',
            'location' => '123 Main St, Anytown, USA',
            'service_date' => '2024-09-25',
            'service_time' => '14:30',
            'carpet_steam_cleaning_area' => 150.5,
            'carpet_steam_cleaning_unit' => 'sqft',
            'carpet_stain_cleaning_area' => 20.75,
            'carpet_stain_cleaning_unit' => 'sqft',
            'message' => 'Please handle with care.',
            'status' => 'Pending',
        ]);

        // You can add more entries as needed
        CarpetCleaningService::create([
            'name' => 'Jane Smith',
            'phone' => '987-654-3210',
            'email' => 'janesmith@example.com',
            'location' => '456 Elm St, Othertown, USA',
            'service_date' => '2024-09-26',
            'service_time' => '09:00',
            'carpet_steam_cleaning_area' => 200.0,
            'carpet_steam_cleaning_unit' => 'sqm',
            'carpet_stain_cleaning_area' => 30.5,
            'carpet_stain_cleaning_unit' => 'sqm',
            'message' => 'Urgent cleaning needed.',
            'status' => 'Approved',
        ]);
    }
}
