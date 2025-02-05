<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quiz';

    protected $fillable = [
        'title', 
        'description'
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'quiz_question');
    }

    public function quizAttempts()
    {
        return $this->hasMany(UserQuizRecord::class);
    }
}