<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use CommonTrait;

    public function getUser(){
        try {
            $user=Auth::user();
            return $this->sendSuccess('User profile', $user);
        } catch (\Exception$exception) {
            return $this->sendError($exception->getMessage(), null);
        }
    }
}
