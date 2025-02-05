<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::with(['quizAttempts.quiz.questions'])->get();

        $leaderboard = $users->map(function ($user) {
            $totalXP = $user->xp;
        
            $totalCorrect = $user->art + $user->geography + $user->history + $user->science + $user->sports;
        
            return (object)[
                'name' => $user->name,
                'xp' => $totalXP,
                'total_correct_answers' => $totalCorrect
            ];
        })->sortByDesc('xp')->take(10);        

        return view('leaderboard', compact('leaderboard'));
    }
}