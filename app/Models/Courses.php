<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{
    use HasFactory;

    public function creator()
   {
       return $this->belongsTo(User::class, 'creator_id', 'id');
   }

   public function quiz()
   {
       return $this->hasOne(Quizes::class, 'course_id', 'id');
   }

   public function lecture()
   {
       return $this->hasOne(Lectures::class, 'course_id', 'id');
   }

   public function favourite(){
        return $this->hasOne(FavouriteCourse::class, 'course_id', 'id')
        ->where('user_id',Auth::id());
   }

   public function student_course(){
        return $this->hasOne(StudentCourse::class, 'course_id', 'id');
   }

   public function student_course_active(){
        return $this->hasOne(StudentCourse::class, 'course_id', 'id')->where('status','active');
    }

    public function student_course_completed(){
        return $this->hasOne(StudentCourse::class, 'course_id', 'id')->where('status','completed');
    }
}
