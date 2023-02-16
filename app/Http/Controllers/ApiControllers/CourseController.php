<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Courses;
use App\Models\Questions;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    use CommonTrait;
    public function getCourses(Request $request){

        $courses = Courses::with('creator')->get();
        return $this->sendSuccess('all courses', $courses);
    }

    public function getCourseDetail(Request $request){
        $courses = Courses::where('id',$request->course_id)
        ->with('creator','quiz','lecture','quiz.questions','quiz.questions.options','favourite')
        ->first();
        $times = null;
        $favuorite = false;
        if($courses && $courses->quiz){
            $times = Questions::where('quiz_id',$courses->quiz->id)->orderBy('time','asc')->pluck('time');
        }

        if($courses && $courses->favourite){
            $favuorite = true;
        }

        $data['courses'] = $courses;
        $data['times'] = $times;
        $data['favuorite'] = $favuorite;
        return $this->sendSuccess('courses', $data);
    }

}
