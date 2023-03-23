<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Category;
use App\Models\CourseRating;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use Illuminate\Support\Carbon;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    use CommonTrait;

    public function getCategories()
    {
        try{
            $categories= Category::all();
            return $this->sendSuccess('All categories',$categories);
        }catch(Exception $e){
            return $this->sendError($e->getMessages(),null);
        }
    }

    public function getDashabordData(){
        try{
            $courses = Courses::where('creator_id',Auth::id())->pluck('id');
            $data['reviews']= CourseRating::whereIn('course_id',$courses)->with('user')->orderBy('id','desc')->limit(5)->get();
            $data['total_courses'] = count($courses);
            $data['stats'] = StudentCourse::whereIn('course_id',$courses)->select(DB::raw('round(COUNT(course_id),0) as total_enrolled'),DB::raw('round(SUM(questions_attempted),0) as question_answered'),DB::raw('round(AVG(score),0) as average'))->first();

            $thisyear = Carbon::now();
            $monthData = array();
            $userData = array();
            $months = 12;
            $MonthFirstDate = $thisyear->startOfYear();
            for ($i = 1; $i <= $months; $i++) {
                $userCount = StudentCourse::whereIn('course_id', $courses)->whereMonth('created_at', $MonthFirstDate)->whereYear('created_at',$thisyear->format('Y'))->count();
                array_push($monthData, $MonthFirstDate->format('F'));
                array_push($userData, $userCount);
                $MonthFirstDate = $MonthFirstDate->addMonths(1);
            }
            
            $data['label'] = $monthData;
            $data['user'] = $userData;

            return $this->sendSuccess('All data',$data);
        }catch(Exception $e){
            return $this->sendError($e->getMessages(),null);
        }
    }
}
