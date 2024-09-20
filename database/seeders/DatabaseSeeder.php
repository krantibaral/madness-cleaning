<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UserSeeder::class);

        
        $this->call(LeaseCleaningSeeder::class);
        $this->call(HouseCleaningServiceSeeder::class);
        $this->call(WindowsCleaningServiceSeeder::class);
        $this->call(CarpetCleaningServiceSeeder::class);
        $this->call(ServiceSeeder::class); 
    }
}
