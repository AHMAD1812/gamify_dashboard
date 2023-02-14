<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizes extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->hasMany(Questions::class, 'quiz_id', 'id')->orderBy('time','asc');
    }
}
