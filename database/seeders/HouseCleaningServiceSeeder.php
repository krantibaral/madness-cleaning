<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HouseCleaningService;

class HouseCleaningServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create multiple entries for house cleaning services
        HouseCleaningService::create([
            'name' => 'Sarah Connor',
            'email' => 'sarah@example.com',
            'phone' => '111-222-3333',
            'location' => '404 Sunset Blvd, Anytown, USA',
            'number_of_bedroom' => 3,
            'number_of_bathroom' => 2,
            'number_of_story' => 1,
            'frequency' => 'Weekly',
            'price' => 20,
            'service_date' => '2024-10-01',
            'service_time' => '10:00',
            'message' => 'Please focus on the kitchen and living room.',
            'status' => 'Pending',
        ]);

        HouseCleaningService::create([
            'name' => 'John Wick',
            'email' => 'john@example.com',
            'phone' => '444-555-6666',
            'location' => '505 Victory Lane, Othertown, USA',
            'number_of_bedroom' => 4,
            'number_of_bathroom' => 3,
            'number_of_story' => 2,
            'frequency' => 'Fortnightly',
            'service_date' => '2024-10-03',
            'service_time' => '14:00',
            'price' => 20,
            'message' => null, // Nullable
            'status' => 'Approved',
        ]);

        HouseCleaningService::create([
            'name' => 'Bruce Wayne',
            'email' => 'bruce@example.com',
            'phone' => '777-888-9999',
            'location' => '606 Gotham St, Sometown, USA',
            'number_of_bedroom' => 5,
            'number_of_bathroom' => 4,
            'number_of_story' => 3,
            'frequency' => 'Monthly',
            'service_date' => '2024-10-05',
            'service_time' => '09:00',
            'price' => 20,
            'message' => 'Special attention needed for the attic.',
            'status' => 'Pending',
        ]);
    }
}
