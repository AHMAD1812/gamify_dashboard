<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\CourseRating;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    use CommonTrait;
    public function getReviews(Request $request){
        try{
            
            $courses = Courses::where('creator_id',Auth::id())->pluck('id');

            $reviews = CourseRating::whereIn('course_id',$courses)->with('user','course:id,title')->latest()->get();

            return $this->sendSuccess('All reviews',$reviews);
        }catch(Exception $e){
            return $this->sendError($e->getMessages(),null);
        }
    }
}
