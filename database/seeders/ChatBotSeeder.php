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
        ChatBot::create([ 'question' => 'What services do you provide?', 'answer' => 'Carpet Cleaning, House Cleaning, Windows Cleaning' ]);
    }
}
