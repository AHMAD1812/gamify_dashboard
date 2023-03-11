<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Category;
use App\Models\CourseRating;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
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
            return $this->sendSuccess('All data',$data);
        }catch(Exception $e){
            return $this->sendError($e->getMessages(),null);
        }
    }
}
