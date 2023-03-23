<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    
    public function instructor(){
        $instructors = User::where('role','instructor')->with('categories:id,name')->withCount('courses')->latest()->get();

        return view('admin.instructor.index',get_defined_vars());
    }

    public function student(){
        $students = User::where('role','student')->with('categories:id,name')->withCount('student_courses')->latest()->get();
        return view('admin.student.index', get_defined_vars());
    }
}
