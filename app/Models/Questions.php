<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questions extends Model
{
    use HasFactory;

    public function options()
    {
        return $this->hasMany(Options::class, 'question_id', 'id');
    }

    public function attempted_question()
    {
        return $this->hasMany(AttemptedQuestions::class, 'question_id', 'id')
        ->where('user_id',Auth::id());
    }
}
