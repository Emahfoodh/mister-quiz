<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizQuestionSeeder extends Seeder
{
    public function run()
    {
        $quizQuestions = [
            [1, 1], [1, 2], [1, 3],  [1, 13], [1, 14], [1, 15],
            [1, 25], [1, 26], [1, 27], [1, 37], [1, 38], [1, 39],
            [1, 49], [1, 50], [1, 51],

            [2, 4], [2, 5], [2, 6], [2, 16], [2, 17], [2, 18],
            [2, 28], [2, 29], [2, 30], [2, 40], [2, 41], [2, 42],
            [2, 52], [2, 53], [2, 54],

            [3, 7], [3, 8], [3, 9], [3, 19], [3, 20], [3, 21],
            [3, 31], [3, 32], [3, 33], [3, 43], [3, 44], [3, 45],
            [3, 55], [3, 56], [3, 57],

            [4, 10], [4, 11], [4, 12], [4, 22], [4, 23], [4, 24],
            [4, 34], [4, 35], [4, 36], [4, 46], [4, 47], [4, 48],
            [4, 58], [4, 59], [4, 60],
        ];

        foreach ($quizQuestions as [$quizId, $questionId]) {
            DB::table('quiz_question')->insert([
                'quiz_id' => $quizId,
                'question_id' => $questionId,
            ]);
        }
    }
}
