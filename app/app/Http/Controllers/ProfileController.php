<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        // Get all completed quiz attempts with their questions
        $quizAttempts = $user->quizAttempts()
            ->with('quiz.questions')
            ->where('completed', true)
            ->get();

        $totalXP = $user->total_xp;


        // Group questions by category considering all attempts separately
        $categoryCounts = $quizAttempts->flatMap(function ($attempt) {
            return $attempt->quiz->questions->map(fn($question) => strtolower($question->category));
        })->countBy();
        error_log($categoryCounts);
        // Define supported categories
        $categories = ['art', 'geography', 'history', 'science', 'sports'];
        $stats = [];

        foreach ($categories as $category) {
            $total = $categoryCounts->get($category, 0);
            $correct = $user->$category;

            $stats[$category] = [
                'correct' => $correct,
                'total' => $total,
                'percentage' => $total > 0 ? round(($correct / $total) * 100, 2) : 0
            ];
        }

        $rank = $this->determineRank($totalXP);

        return view('profile', compact('user', 'rank', 'stats', 'totalXP'));
    }

    private function determineRank($xp)
    {
        return match (true) {
            $xp < 1500 => 'Quiz Apprentice',
            $xp < 5000 => 'Average Quizer',
            $xp < 10000 => 'Epic Quizer',
            default => 'Quiz Master',
        };
    }
}
