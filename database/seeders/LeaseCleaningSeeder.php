<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaseCleaning;

class LeaseCleaningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create multiple entries for lease cleaning services
        LeaseCleaning::create([
            'name' => 'Emily Davis',
            'phone' => '123-456-7890',
            'email' => 'emily@example.com',
            'location' => '123 Elm St, Anytown, USA',
            'number_of_bedrooms' => 2,
            'number_of_bathrooms' => 1,
            'window_cleaning' => 'Inside',
            'oven_cleaning' => true,
            'stove_cleaning' => false,
            'number_of_walls_cleaned' => 4,
            'carpet_steam_cleaning_area' => '150',
            'carpet_steam_cleaning_unit' => 'sqft',
            'service_date' => '2024-10-10',
            'service_time' => '11:00',
            'message' => 'Focus on kitchen and living room.',
            'status' => 'Pending',
            'price' => 20,
        ]);

        LeaseCleaning::create([
            'name' => 'Mark Johnson',
            'phone' => '987-654-3210',
            'email' => 'mark@example.com',
            'location' => '456 Oak St, Othertown, USA',
            'number_of_bedrooms' => 3,
            'number_of_bathrooms' => 2,
            'window_cleaning' => 'Both',
            'oven_cleaning' => false,
            'stove_cleaning' => true,
            'number_of_walls_cleaned' => 5,
            'carpet_steam_cleaning_area' => '200',
            'carpet_steam_cleaning_unit' => 'sqm',
            'service_date' => '2024-10-15',
            'service_time' => '15:00',
            'message' => 'Please ensure thorough cleaning.',
            'status' => 'Approved',
            'price' => 20,
        ]);

        LeaseCleaning::create([
            'name' => 'Linda Smith',
            'phone' => '555-123-4567',
            'email' => 'linda@example.com',
            'location' => '789 Pine St, Sometown, USA',
            'number_of_bedrooms' => 1,
            'number_of_bathrooms' => 1,
            'window_cleaning' => 'Outside',
            'oven_cleaning' => true,
            'stove_cleaning' => true,
            'number_of_walls_cleaned' => 3,
            'carpet_steam_cleaning_area' => '100',
            'carpet_steam_cleaning_unit' => 'sqft',
            'service_date' => '2024-10-20',
            'service_time' => '09:00',
            'message' => null, // Nullable
            'status' => 'Pending',
            'price' => 20,
        ]);
    }
}
