<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Models\FavouriteCourse;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FavouriteCourseController extends Controller
{
    use CommonTrait;

    public function addCourseFavourite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();
            $favourite = FavouriteCourse::where('user_id', Auth::id())->where('course_id', $request->course_id)->first();
            if (!$favourite) {
                $favourite = new FavouriteCourse;
                $favourite->user_id = Auth::id();
                $favourite->course_id = $request->course_id;
                $favourite->save();
                DB::commit();
                return $this->sendSuccess('Course Added to favourite', $favourite);
            }

            $course = Courses::find($request->course_id);
            $this->sendNotification($course->creator_id,Auth::id(),'favorite', 'Hello '.Auth::id()->full_name.'! You have add a course into the favorite.');

            return $this->sendError('Already in favourites', null);
        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function removeCourseFavourite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();
            $favourite = FavouriteCourse::where('user_id', Auth::id())->where('course_id', $request->course_id)->first();
            if ($favourite) {
                $favourite->delete();
                DB::commit();
                return $this->sendSuccess('Course remove from favourite', null);
            }
            
            $course = Courses::find($request->course_id);
            
            $this->sendNotification($course->creator_id,Auth::id(),'favorite', 'Hello '.Auth::id()->full_name.'! Course has been removed from favorite.');

            return $this->sendError('Not found', null);
        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function getFavouriteCourses(Request $request){
        $courses = Courses::whereHas('favourite')->with('creator')->get();
        return $this->sendSuccess('Favourite courses', $courses);
    }
}
