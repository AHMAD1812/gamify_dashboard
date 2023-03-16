<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.main');
    }

    public function teacher(){
        return view('admin.teacher.index');
    }

    public function student(){
        return view('admin.student.index');
    }

    public function login(){
        return view('admin.login.index');
    }

    public function register(){
        return view('admin.register.index');
    }

    public function forgot(){
        return view('admin.forgot.index');
    }

    public function profile(){
        return view('admin.profile.index');
    }

    public function courses(){
        return view('admin.courses.index');
    }
    public function feedback(){
        return view('admin.feedback.index');
    }

}
