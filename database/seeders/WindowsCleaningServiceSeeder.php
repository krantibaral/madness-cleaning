<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WindowsCleaningService;

class WindowsCleaningServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create multiple entries for windows cleaning services
        WindowsCleaningService::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'phone' => '123-456-7890',
            'location' => '101 Pine St, Anytown, USA',
            'number_of_windows' => 10,
            'number_of_story' => 2,
            'service_date' => '2024-09-30',
            'service_time' => '10:00',
            'message' => 'Please be careful with the fragile window decorations.',
            'type' => 'Both',
            'windows_track_frame' => 'Track',
            'status' => 'Pending',
        ]);

        WindowsCleaningService::create([
            'name' => 'Bob Smith',
            'email' => 'bob@example.com',
            'phone' => '987-654-3210',
            'location' => '202 Maple Ave, Othertown, USA',
            'number_of_windows' => 15,
            'number_of_story' => 1,
            'service_date' => '2024-10-02',
            'service_time' => '14:30',
            'message' => null, // Nullable
            'type' => 'Outside',
            'windows_track_frame' => 'Frame',
            'status' => 'Approved',
        ]);

        WindowsCleaningService::create([
            'name' => 'Charlie Brown',
            'email' => 'charlie@example.com',
            'phone' => '555-123-4567',
            'location' => '303 Birch St, Sometown, USA',
            'number_of_windows' => 20,
            'number_of_story' => 3,
            'service_date' => '2024-10-05',
            'service_time' => '09:00',
            'message' => 'Special attention needed for the high windows.',
            'type' => 'Inside',
            'windows_track_frame' => 'Both',
            'status' => 'Pending',
        ]);
    }
}
