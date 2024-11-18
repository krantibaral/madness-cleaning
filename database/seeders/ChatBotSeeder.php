<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChatBot;

class ChatBotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChatBot::create([
            'question' => 'What services do you provide?',
            'answer' => 'Carpet Cleaning, House Cleaning, Windows Cleaning, Commercial Cleaning, Builder Cleaning'
        ]);
        
        ChatBot::create([
            'question' => 'What are your working hours?',
            'answer' => 'We are open from 8:00 AM to 6:00 PM, Monday to Saturday.'
        ]);
        
        ChatBot::create([
            'question' => 'Do you offer same-day service?',
            'answer' => 'Yes, we do offer same-day service depending on availability.'
        ]);
    }
}
