<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Traits\CommonTrait;
use App\Models\AttemptedQuestions;
use App\Models\Courses;
use App\Models\Questions;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    use CommonTrait;
    public function getCourses(Request $request)
    {

        $courses = Courses::whereDoesntHave('student_course')->with('creator')->get();
        return $this->sendSuccess('all courses', $courses);
    }

    public function getCourseDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            $courses = Courses::where('id', $request->course_id)
                ->with('creator', 'favourite', 'student_course')
                ->first();

            $favuorite = false;
            $added = false;

            if ($courses && $courses->favourite) {
                $favuorite = true;
            }

            if ($courses && $courses->student_course) {
                $added = true;
            }

            $data['courses'] = $courses;
            $data['favuorite'] = $favuorite;
            $data['added'] = $added;

            return $this->sendSuccess('courses', $data);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), null);
        }

    }

    public function getStudentCourses(Request $request)
    {

        $courses = Courses::wherehas('student_course')->with('creator')->get();
        return $this->sendSuccess('all courses', $courses);
    }

    public function addStudentCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();
            $student_course = StudentCourse::where('course_id', $request->course_id)->where('user_id', Auth::id())->first();
            if ($student_course) {
                return $this->sendError('Already added to course', null);
            }

            $course = Courses::where('id', $request->course_id)->with('quiz', 'quiz.questions')->first();

            $student_course = new StudentCourse;
            $student_course->user_id = Auth::id();
            $student_course->course_id = $course->id;
            if ($course->quiz) {
                $student_course->total_questions = count($course->quiz->questions);
            }
            $student_course->save();

            DB::commit();
            return $this->sendSuccess('Applied to course', $student_course);
        } catch (Exception $e) {
            DB::rollback();
            $this->sendError($e->getMessage(), null);
        }
    }

    public function getStudentCourseDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            $student_course = StudentCourse::where('course_id', $request->course_id)->where('user_id', Auth::id())->first();
            if (!$student_course) {
                return $this->sendError('Not added to course', null);
            }

            $courses = Courses::where('id', $request->course_id)
                ->with('creator', 'quiz', 'lecture', 'favourite', 'student_course')
                ->first();
            $times = null;
            $favuorite = false;
            $added = false;
            $questions = null;
            if ($courses && $courses->quiz) {
                $questions = Questions::where('quiz_id', $courses->quiz->id)->whereDoesntHave('attempted_question')
                    ->with('options')->orderBy('time', 'asc')->get();
                $times = array();
                foreach ($questions as $question) {
                    array_push($times, $question->time);
                }
            }

            if ($courses && $courses->favourite) {
                $favuorite = true;
            }

            if ($courses && $courses->student_course) {
                $added = true;
            }

            $data['courses'] = $courses;
            $data['student_courses'] = $student_course;
            $data['times'] = $times;
            $data['favuorite'] = $favuorite;
            $data['questions'] = $questions;
            $data['added'] = $added;

            return $this->sendSuccess('courses', $data);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), null);
        }

    }

    public function attemptQuizQuestion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'question_id' => 'required|exists:questions,id',
            'answered' => 'required',
            'score' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();
            $student_course = StudentCourse::where('course_id', $request->course_id)->where('user_id', Auth::id())->first();

            if (!$student_course) {
                return $this->sendError('Not applied to course', null);
            }

            $attempt = AttemptedQuestions::where('user_id', Auth::id())->where('question_id', $request->question_id)->first();
            if ($attempt) {
                return $this->sendError('Question Already attempted', null);
            }
            $attempt = new AttemptedQuestions;
            $attempt->user_id = Auth::id();
            $attempt->question_id = $request->question_id;
            $attempt->save();

            $student_course->questions_attempted += 1;
            if ($request->answered == 'true') {
                $student_course->correct_answered += 1;
            } else if ($request->answered == 'false') {
                $student_course->wrong_answered += 1;
            }
            $student_course->score += (int) $request->score;
            $student_course->update();

            DB::commit();
            return $this->sendSuccess('Question Attempted', $student_course);
        } catch (Exception $e) {
            DB::rollback();
            $this->sendError($e->getMessage(), null);
        }
    }
}
