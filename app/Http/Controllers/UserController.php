<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function updateUser(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'biography' => 'required',
            'facebook' => 'sometimes',
            'linkedin' => 'sometimes',
            'youtube' => 'sometimes',
            'profile_image' => 'sometimes',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            $user = Auth::user();
            $user->full_name=$request->full_name;
            $user->biography=$request->biography;
            $user->linkedin=$request->linkedin ? $request->linkedin : null;
            $user->facebook=$request->facebook ? $request->facebook : null;
            $user->youtube=$request->youtube ? $request->youtube : null;
            if($request->profile_image){
                if($user->profile_img != null){
                    unlink($user->profile_img);
                }
                $user->profile_img = $this->addFile($request->profile_image,'uploads/profile/'.Auth::id().'/');
            }
            $user->update();
            return $this->sendSuccess("Profile Updated", Auth::user());
        } catch (\Exception$exception) {
            return $this->sendError($exception->getMessage(), null);
        }
    }
}
