<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use App\Models\UserQuizRecord;

class QuizController extends Controller
{
    public function start(Request $request)
    {
        // Log the request data for debugging
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to start the quiz.');
        }

        // Check if quiz questions are already stored in the session
        if ($request->session()->has('quiz_questions') && $request->session()->has('quiz_id')) {
            // Retrieve quiz questions from the session
            $questions = $request->session()->get('quiz_questions');
            $quiz = Quiz::find($request->session()->get('quiz_id'));
        } else {
            $quiz = Quiz::inRandomOrder()->first();
            $questions = $quiz->questions()->with('answers')->get();
            $request->session()->put('quiz_id', $quiz->id);
            $request->session()->put('quiz_questions', $questions);
        }

        return view('quiz.start', compact('quiz', 'questions'));
    }


    public function submit(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'You must be logged in'], 401);
        }

        $user = Auth::user();
        $quizData = $request->session()->get('quiz_questions', []);
        $answers = $request->input('answers');

        if (!$answers || count($answers) < count($quizData)) {
            return response()->json(['error' => 'You must answer all questions before submitting.'], 422);
        }

        $correctAnswers = 0;
        $categoryCorrect = [
            'Art' => 0,
            'History' => 0,
            'Geography' => 0,
            'Science' => 0,
            'Sports' => 0
        ];

        // Calculate the number of answers per category
        $categoryTotal = [
            'Art' => 0,
            'History' => 0,
            'Geography' => 0,
            'Science' => 0,
            'Sports' => 0
        ];

        foreach ($quizData as $question) {
            $correctAnswer = \App\Models\Answer::where('question_id', $question['id'])
                ->where('correct', true)
                ->first();

            if ($correctAnswer) {
                $categoryTotal[$question['category']]++;

                if (isset($answers[$question['id']]) && $answers[$question['id']] == $correctAnswer->id) {
                    $correctAnswers++;
                    $user->xp += $question['xp'];
                    $categoryCorrect[$question['category']]++;
                }
            }
        }

        // Update user's XP and category stats
        foreach ($categoryCorrect as $category => $count) {
            if ($count > 0) {
                $category = strtolower($category); // You might want to handle this better if these properties aren't in the user model
                if (array_key_exists($category, $user->getAttributes())) {
                    $user->{$category} += $count;
                } else {
                    error_log("Property $category does not exist on the User model.");
                }                
            }
        }

        $user->save();

        // Ensure the quiz ID exists in the session
        $quizId = $request->session()->get('quiz_id');

        if (!$quizId) {
            return back()->with('error', 'Quiz session not found.');
        }

        // Update the UserQuizRecord table
        $quizAttempt = new UserQuizRecord();
        $quizAttempt->user_id = $user->id;
        $quizAttempt->quiz_id = $request->session()->get('quiz_id');
        $quizAttempt->completed = true;
        $quizAttempt->save();

        // Clear session
        $request->session()->forget('quiz_questions');
        $request->session()->forget('quiz_id');

        return response()->json([
            'correctAnswers' => $correctAnswers,
            'totalQuestions' => count($quizData),
            'categoryCorrect' => $categoryCorrect,
            'categoryTotal' => $categoryTotal,
            'percentage' => round(($correctAnswers / count($quizData)) * 100)
        ]);
    }
}
