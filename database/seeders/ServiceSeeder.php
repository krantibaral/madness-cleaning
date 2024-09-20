<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create multiple service entries
        Service::create([
            'name' => 'Carpet Cleaning',
            'price' => 1500,
            'location' => '123 Main St, Anytown, USA',
            'description' => 'Professional carpet cleaning service using eco-friendly products.',
            'working_information' => 'Available daily from 8 AM to 6 PM.',
        ]);

        Service::create([
            'name' => 'House Cleaning',
            'price' => 2500,
            'location' => '456 Elm St, Othertown, USA',
            'description' => 'Complete house cleaning service with experienced staff.',
            'working_information' => 'Monday to Saturday, 9 AM to 5 PM.',
        ]);

        Service::create([
            'name' => 'Window Cleaning',
            'price' => 1000,
            'location' => '789 Oak St, Anytown, USA',
            'description' => 'Expert window cleaning for residential and commercial properties.',
            'working_information' => null, // Nullable
        ]);
    }
}
