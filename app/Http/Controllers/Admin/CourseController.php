<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(){
        $courses = Courses::with('creator:id,full_name')->latest()->get();

        return view('admin.courses.index',get_defined_vars());
    }
}
