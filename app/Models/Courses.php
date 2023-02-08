<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

   public function quiz()
   {
       return $this->hasOne(Quizes::class, 'course_id', 'id');
   }

   public function lecture()
   {
       return $this->hasOne(Lectures::class, 'course_id', 'id');
   }
}
