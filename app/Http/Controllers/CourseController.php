<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Quizes;
use App\Models\Courses;
use App\Models\Options;
use App\Models\Lectures;
use App\Models\Questions;
use App\Models\CourseRating;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Models\FavouriteCourse;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    use CommonTrait;
    public function addCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'level' => 'required',
            'category' => 'required',
            'descriptions' => 'required',
            'objectives' => 'sometimes',
            'requirement' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'questions' => 'sometimes',
            'curriculum' => 'required',
            'lecture_title' => 'sometimes',
            'lecture_description' => 'sometimes',
            'lecture_file' => 'sometimes',
            'video_type' => 'required',
            'thumbnail_file' => 'sometimes',
            'video' => 'sometimes',
            'video_link' => 'sometimes',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();
            $course = new Courses;
            $course->creator_id = Auth::id();
            $course->title = $request->title;
            $course->description = $request->descriptions;
            $course->requirement = $request->requirement;
            $course->course_level = $request->level;
            $course->categories = implode(',',$request->category);
            $course->objectives =  $request->objectives;
            // $course->objectives =  'Finally';
            $course->code = mt_rand(100000, 999999);
            $course->start_date = $request->start_date;
            $course->end_date = $request->end_date;
            //Adding Thumbnail
            $course->poster = $this->addFile($request->thumbnail_file,'uploads/courses/');
            if($course->poster == false){
                return $this->sendError('Invalid Poster', null);
            }
            //Adding Video
            $course->video = $request->video_type == 'mp4' ? $this->addFile($request->video,'uploads/courses/') : $request->video_link;

            if($course->video == false){
                return $this->sendError('Error Uploading Video', null);
            }

            if($request->video_type == 'mp4'){
                $getID3 = new \getID3();
                $fileDuration = $getID3->analyze($course->video);
                $course->playing_time = date('H:i:s', $fileDuration['playtime_seconds']);
            }
            
            $course->save();

            foreach($request->curriculum as $curriculum){
                if($curriculum['type'] == 'quiz'){
                    $quiz = new Quizes;
                    $quiz->course_id = $course->id;
                    $quiz->save();

                    foreach($request->questions as $question){
                        $new_question = new Questions;
                        $new_question->quiz_id = $quiz->id;
                        $new_question->title=$question['name'];
                        $new_question->time=$question['time'];
                        $new_question->hour=$question['is_hour'] == 'true' ? true : false;
                        $new_question->score=$question['score'];
                        $new_question->save();

                        foreach($question['options'] as $option){
                            $new_option = new Options;
                            $new_option->question_id = $new_question->id;
                            $new_option->title = $option['name'];
                            $new_option->correct = $option['isCorrect'] == 'true' ? true : false;
                            $new_option->save();
                        }
                    }
                }else if($curriculum['type'] == 'lecture'){
                    $lecture = new Lectures;
                    $lecture->course_id = $course->id;
                    $lecture->title = $request->lecture_title;
                    $lecture->description = $request->lecture_description;
                    $lecture->file  = $this->addFile($request->lecture_file,'uploads/courses/');
                    if($lecture->file == false){
                        return $this->sendError('Error Uploading Lecture file', null);
                    }
                    $lecture->save();
                }
            }
            
            $this->sendNotification(Auth::id(),Auth::id(),'notification', 'Hello '.Auth::user()->full_name.'! Your course has been successfully approved. It is now available for the students');

            DB::commit();
            return $this->sendSuccess('Course Created Successfully', null);
        } catch (\Exception $exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }
        // dd($request);
    }

    public function getCourses(Request $request){
        try{
            $courses = Courses::where('creator_id',Auth::id())->where('status','active')->withCount('enrolled_students')->withAvg('course_rating','rating')->latest()->get();
            
            return $this->sendSuccess('Courses', $courses);
        }catch(Exception $e){
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function getCourseDetail($id){
        
        try{
            $data['course'] = Courses::where('id',$id)->first();
            if(!$data['course']){
                return $this->sendSuccess('Course detail', $data);
            }
            $data['leaderboard'] = StudentCourse::where('course_id',$data['course']->id)->where('score','>',0)->with('student')->orderBy('score','desc')->get();
            $data['reviews'] = CourseRating::where('course_id',$data['course']->id)->with('user')->latest()->get();
            $data['favourite_count'] = FavouriteCourse::where('course_id',$data['course']->id)->count();
            return $this->sendSuccess('Course detail', $data);
        }catch(Exception $e){
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function deleteCourse(Request $request){
        try{
            Courses::where('id',$request->course_id)->update([
                'status'=>'deleted',
            ]);
            
            return $this->sendSuccess('Courses', null);
        }catch(Exception $e){
            return $this->sendError($e->getMessage(), null);
        }
    }
}
