<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
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
            'categories' => 'required',
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
            return $this->sendSuccess('Successfully registered', $user->id);
        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }
    }

    public function otpVerification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {

            DB::beginTransaction();

            $user = User::find($request->id);

            if ($user != null) {
                if ($user->otp == $request->code) {
                    $user->otp = null;
                    $user->email_verified_at = date("Y-m-d H:i:s", strtotime('now'));
                    $user->status = "active";
                    $user->update();
                } else {
                    return $this->sendError("Code is Incorrect", null);
                }
            } else {
                return $this->sendError("User not found", null);
            }

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
            'remember_me' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            DB::beginTransaction();

            $user = User::where('email', '=', $request->email)->where('role', '=', 'business')->first();

            if ($user != null) {
                if ($user->status == 'active') {
                    if (Hash::check($request->password, $user->password)) {
                        if ($user->email_verified_at == null) {
                            $code = mt_rand(100000, 999999);
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
                                $user->forceDelete();
                                return $this->sendError($e->getMessage(), null);
                            }
                            return $this->sendWarning("Not Verified", $user->id);
                        } else {
                            $remember= $request->remember_me=='true' ? true:false ;
                            if (Auth::attempt($request->only('email', 'password'),$remember)) {
                                return $this->sendSuccess('Login Successfully', $user->id);
                            }
                        }
                    } else {
                        return $this->sendError("Password is incorrect", null);
                    }
                } else {
                    return $this->sendError("Blocked By Admin", null);
                }
            } else {
                return $this->sendError("Email not found", null);
            }

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
                $code = mt_rand(100000, 999999);
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

        $request->session()->invalidate();

        $request->session()->regenerateToken();

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
