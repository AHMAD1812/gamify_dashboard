<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use CommonTrait;
    public function getUser()
    {
        $user = User::where('email', Auth::user()->email)->first();

        return $this->sendSuccess('User.', $user);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'sometimes',
            'profile_image' => 'sometimes|mimes:jpeg,jpg,png,gif',
            'gender' => 'sometimes|in:male,female,other',
            'bio'=>'sometimes'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $user->full_name = isset($request->full_name) ? $request->full_name : $user->full_name;
            $user->gender = isset($request->gender) ? $request->gender : $user->gender;
            $user->biography = isset($request->bio) ? $request->bio : $user->bio;

            if ($request->profile_image) {
                $user->profile_img = $this->addFile($request->profile_image, 'uploads/profile/');
            }
            $user->update();
            DB::commit();

            return $this->sendSuccess('Profile Successfully Updated', $user);
        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }
    }
}
