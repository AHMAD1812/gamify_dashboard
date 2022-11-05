<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        return view('app.main.index');
    }

    public function about(){
        return view('app.about.index');
    }
}
