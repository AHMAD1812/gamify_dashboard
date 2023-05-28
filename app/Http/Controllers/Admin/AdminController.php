<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Courses;
use App\Models\Support;
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
            $students = User::where('role','student')->count();
            $instructors = User::where('role','instructor')->count();

            $courses = Courses::count();

            $support = Support::count();

            //Chart Data
            $thisyear = Carbon::now();
            $all_months = array();
            $all_instructors = array();
            $all_courses = array();
            $all_users = array();
            $months = 12;
            $MonthFirstDate = $thisyear->startOfYear();
            
            for ($i = 1; $i <= $months; $i++) {
                $instructorCount = User::whereMonth('created_at', $MonthFirstDate)->whereYear('created_at',$thisyear->format('Y'))->where('role','instructor')->count();
                $courseCount = Courses::whereMonth('created_at', $MonthFirstDate)->whereYear('created_at',$thisyear->format('Y'))->count();
                $userCount = User::whereMonth('created_at', $MonthFirstDate)->whereYear('created_at',$thisyear->format('Y'))->where('role','student')->count();
                array_push($all_months,$MonthFirstDate->format('Y/m/d'));
                array_push($all_instructors,$instructorCount);
                array_push($all_courses,$courseCount);
                array_push($all_users,$userCount);
                $MonthFirstDate = $MonthFirstDate->addMonths(1);
            }

            return view('admin.main', get_defined_vars());
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
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

    public function support(){
        $supports = Support::with('user')->latest()->get();
        return view('admin.support.index',get_defined_vars());
    }

}
