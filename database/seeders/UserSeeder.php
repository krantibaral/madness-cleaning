<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User([
            'name' => 'Admin',
            'email' => 'admin@mads.com',
            'address' => 'Pokhara',
            'phone' => '984604921',
            'password' => bcrypt('Admin@123')
        ]);
        $user->save();
    }
}
