<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Courses;
use App\Models\Questions;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    use CommonTrait;
    public function getCourses(Request $request){

        $courses = Courses::all();
        return $this->sendSuccess('all courses', $courses);
    }

    public function getCourseDetail(Request $request){
        $courses = Courses::where('id',$request->course_id)->with('quiz','lecture','quiz.questions','quiz.questions.options')->first();
        $times = null;
        if($courses->quiz){
            $times = Questions::where('quiz_id',$courses->quiz->id)->orderBy('time','asc')->pluck('time');
        }

        $data['courses'] = $courses;
        $data['times'] = $times;
        return $this->sendSuccess('courses', $data);
    }
}
