<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    public function run()
    {
        DB::table('quiz')->insert([
            ['id' => 1, 'title' => 'General Knowledge Trivia Vol. 1', 'description' => 'A collection of 15 questions covering History, Art, Geography, Science, and Sports.'],
            ['id' => 2, 'title' => 'General Knowledge Trivia Vol. 2', 'description' => 'A round of 15 questions spanning five categories.'],
            ['id' => 3, 'title' => 'General Knowledge Trivia Vol. 3', 'description' => 'Test your expertise with 15 new questions from diverse fields.'],
            ['id' => 4, 'title' => 'General Knowledge Trivia Vol. 4', 'description' => 'A set of 15 questions to challenge your knowledge.'],
        ]);
    }
}
