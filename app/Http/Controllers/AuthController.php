<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use CommonTrait;

    public function isEmailAvailable(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        return $this->sendSuccess('Email not found');
    }
                                            
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => [
                'required',
                'min:8',
            ],
            'category' => 'required',
            'bio' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
            // return $request;
        }
        try {
            DB::beginTransaction();
            $code = mt_rand(100000, 999999);

            $user = new User;
            $user->full_name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->otp = $code;
            $user->biography=$request->bio;
            $user->role = 'instructor';
            $user->status = 'inactive';

            $user->save();

            foreach($request->category as $category_id){
                $category=new UserCategory;
                $category->user_id=$user->id;
                $category->category_id=$category_id;
                $category->save();
            }

            // $data['email'] = $user->email;
            // $data['subject'] = 'Welcome Email';
            // $data['msg'] = 'Welcome to Snapwork: Verify your Email Using This Code:' . $code;
            // $data['full_name'] = $user->name;
            // try {
            //     Mail::send('emails.welcome_mail', $data, function ($message) use ($data) {

            //         $message->to($data['email'], $data['full_name'])
            //             ->subject($data['subject']);
            //         $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            //     });

            // } catch (\Exception$e) {
            //     return $this->sendError($e->getMessage(), null);
            // }
            DB::commit();
            return $this->sendSuccess('Successfully registered', $user);
        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }
    }

    public function OtpVerification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {

            DB::beginTransaction();

            $user = User::where('id',$request->id)->where('otp',$request->otp)->first();

            if ($user) {
                $user->otp = null;
                $user->email_verified_at = date("Y-m-d H:i:s", strtotime('now'));
                $user->status = "active";
                $user->update();
            } else {
                return $this->sendError("Invalid OTP", null);
            }

            $this->sendNotification($user->id,$user->id,'notification', 'Hello '.$user->full_name.'! We are glad to have you here! Create interactive courses for students');

            DB::commit();

            Auth::login($user);

            return $this->sendSuccess('Successfully Verified', $user->id);
        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }

    }

    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            $user = User::where('email',$request->email)->first();
            if(!$user){
                return $this->sendError("Invalid Credentials", null);
            }
            if($user->status == 'inactive'){
                return $this->sendWarning("Verify your email", $user->id);
            }

            if (Auth::attempt($request->only('email', 'password'))) {
                return $this->sendSuccess('Login Successfully', null);
            } else {
                return $this->sendError("Invalid Credentials", null);
            }

        } catch (\Exception$exception) {
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }

    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            DB::beginTransaction();

            $user = User::where('email', '=', $request->email)->first();

            if ($user) {
                $otp = mt_rand(100000, 999999);
                $user->otp = $code;
                $user->update();

                $data['email'] = $user->email;
                $data['subject'] = 'Forgot Password';
                $data['msg'] = 'Snapwork: Change Password Code:' . $code;
                $data['full_name'] = $user->full_name;
                try {
                    Mail::send('emails.welcome_mail', $data, function ($message) use ($data) {
                        $message->to($data['email'], $data['full_name'])
                            ->subject($data['subject']);
                        $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                    });

                } catch (\Exception$e) {
                    $user->forceDelete();
                    return $this->sendError($e->getMessage(), null);
                }
            } else {
                return $this->sendError("Invalid Email", null);
            }

            DB::commit();
            return $this->sendSuccess('Email Sent', null);

        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }

    }

    public function forgotOtpVerification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {

            DB::beginTransaction();

            $user = User::where('email', '=', $request->email)->first();

            if ($user != null) {
                if ($user->otp == $request->code) {
                    $user->otp = null;
                    $user->update();
                } else {
                    return $this->sendError("Code is Incorrect", null);
                }
            } else {
                return $this->sendError("User not found", null);
            }

            return $this->sendSuccess('Successfully Verified', null);

            DB::commit();

        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }

    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {

            DB::beginTransaction();

            $user = User::where('email', '=', $request->email)->first();

            if ($user) {
                $user->password = bcrypt($request->password);
                $user->update();
            } else {
                return $this->sendError("User not found", null);
            }

            DB::commit();

            return $this->sendSuccess('Password Changed', null);

        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return $this->sendSuccess('Logout successfully', null);
    }

    public function islogin()
    {
        if (Auth::check()) {
            return $this->sendSuccess('User login', null);
        } else {
            return $this->sendError("Not login", null);
        }
    }

    public function resendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();
            $code = mt_rand(100000, 999999);
            $user = User::find($request->id);
            $user->otp = $code;
            $user->update();

            $data['email'] = $user->email;
            $data['subject'] = 'Welcome Email';
            $data['msg'] = 'Welcome to Snapwork: Verify your Email Using This Code:' . $code;
            $data['full_name'] = $user->name;
            try {
                Mail::send('emails.welcome_mail', $data, function ($message) use ($data) {

                    $message->to($data['email'], $data['full_name'])
                        ->subject($data['subject']);
                    $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                });

            } catch (\Exception$e) {
                return $this->sendError($e->getMessage(), null);
            }
            DB::commit();
            return $this->sendSuccess('Email Send', null);
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
