<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class QuizQuestion extends Pivot
{
    protected $table = 'quiz_question';
}