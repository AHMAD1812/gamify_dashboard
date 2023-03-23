<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function index()
    {
        if (Auth::guard('admin')->user()) {
            return view('admin.main');
        }
        return redirect()->route('admin.login');
    }
    
    public function loginProcess(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            if (Auth()->guard('admin')->check()) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->back()->withErrors(['alert-danger' => "Permission Denied"]);
            }
        }
        return back()->withErrors(['alert-danger' => "Invalid Credentials"]);
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
