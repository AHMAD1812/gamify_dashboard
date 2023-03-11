<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use CommonTrait;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users',
            'password' => [
                'required',
                'min:8',
            ],
            'full_name' => 'required',
            'profile_image' => 'sometimes',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            DB::beginTransaction();

            $code = mt_rand(100000, 999999);
            $user = new User;
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->otp = $code;
            $user->role = 'student';
            $user->status = 'inactive';
            if ($request->profile_image) {
                $user->profile_img = $this->addFile($request->profile_image, 'uploads/profile/');
            }
            $user->save();

            $this->sendNotification($user->id,$user->id,'notification', 'Hello '.$user->full_name.'! Your course has been successfully approved. It is now available for the students');

            DB::commit();

            return $this->sendSuccess('User Registered', $user);
        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status' => 'active'])) {
            $user = Auth::user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me) {
                $token->expires_at = Carbon::now()->addWeeks(1);
            }

            $token->save();

            $data['access_token'] = $tokenResult->accessToken;
            $data['token_type'] = 'Bearer';
            $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
            $data['user'] = $user;
            return $this->sendSuccess('Login successfully', $data);
        }
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            if ($user && $user->status == 'deleted') {
                $user->status = 'active';
                $user->update();
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                if ($request->remember_me) {
                    $token->expires_at = Carbon::now()->addWeeks(1);
                }

                $token->save();

                $data['access_token'] = $tokenResult->accessToken;
                $data['token_type'] = 'Bearer';
                $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                $data['user'] = $user;

                return $this->sendSuccess('Login successfully', $data);
            } elseif ($user && $user->status == 'inactive') {
                return $this->sendError('Please verify your email first', null);
            } elseif ($user && $user->status == 'pending') {
                return $this->sendError('Your account approval is pending on admin side', null);
            } else {
                return $this->sendError('Your account approval is blocked by admin', null);
            }
        }
        return $this->sendError('Email or password is incorrect', null);
    }

    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            if ($user->token()->revoke()) {
                return $this->sendSuccess('Logout successfully', null);
            } else {
                return $this->sendSuccess('Failed To Logout', null);
            }
        }
        return $this->sendSuccess('User not found', null);
    }

    public function verifyEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'otp' => 'required|exists:users,otp',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if ($user->otp == $request->otp) {
                    $user->status = 'active';
                    $user->otp = null;
                    $user->save();

                    Auth::login($user);

                    $tokenResult = $user->createToken('Personal Access Token');
                    $token = $tokenResult->token;
                    if ($request->remember_me) {
                        $token->expires_at = Carbon::now()->addWeeks(1);
                    }

                    $token->save();

                    $data['access_token'] = $tokenResult->accessToken;
                    $data['token_type'] = 'Bearer';
                    $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                    $data['user'] = $user;

                    DB::commit();
                    return $this->sendSuccess('Phone Verified Successfully', $data);
                } else {
                    return $this->sendError('OTP is incorrect', null);
                }
            } else {
                return $this->sendError('User not found', null);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => "required|exists:users,email",
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            DB::beginTransaction();
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $code = mt_rand(100000, 999999);
                $user->otp = $code;
                $user->update();
                DB::commit();
                return $this->sendSuccess('OTP Code Sent again', $user);
            } else {
                return $this->sendError('No User Found, Registered With This Phone', null);
            }

        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }

    }

    public function sendforgotPasswordCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => "required|exists:users,email",
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            DB::beginTransaction();
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $code = mt_rand(100000, 999999);
                $user->reset_password = $code;
                $user->update();
                DB::commit();
                return $this->sendSuccess('OTP Code Sent', $user);
            } else {
                return $this->sendError('No User Found, Registered With This Phone', null);
            }

        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function verifyforgotPasswordCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|exists:users,reset_password',
            'email' => 'required|exists:users,email',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();
            $user = User::where('email', $request->email)->where('reset_password', $request->code)->first();
            if ($user) {
                $user->reset_password = null;
                $user->update();
                DB::commit();
                return $this->sendSuccess('Code verified successfully', $user);
            } else {
                return $this->sendError('Invalid Code', null);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'min:8'],
            'email' => 'required|exists:users,email',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            DB::beginTransaction();
            $user = User::where('email', $request->email)->where('reset_password', $request->code)->first();
            if ($user) {
                $user->password = bcrypt($request->password);
                $user->update();
                DB::commit();
                return $this->sendSuccess('Password changed', $user);
            } else {
                return $this->sendError('Invalid Code', null);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function resendForgotPasswordOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            DB::beginTransaction();
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->reset_password = mt_rand(100000, 999999);
                $user->update();
                DB::commit();
                return $this->sendSuccess('Otp resend', $user);
            } else {
                return $this->sendError('No User Found, Registered With This Email', null);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }

    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required'],
            'new_password' => ['required', 'min:8'],
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            DB::beginTransaction();
            $user = User::find(Auth::id());
            if (Hash::check($request->password, $user->password)) {
                $user->password = bcrypt($request->new_password);
                $user->update();
                DB::commit();
                return $this->sendSuccess('Password changed', $user);
            } else {
                return $this->sendError('Invalid Password', null);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }
    public function socialLogin(Request $request)
    {
        $request->validate([
            'full_name' => 'sometimes',
            'email' => 'sometimes',
            'google_id' => 'sometimes',
            'avatar' => 'sometimes',
        ]);
        DB::beginTransaction();
        try {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                if ($user->status == 'inactive') {
                    return $this->sendError('Please verify your email to continue.', null);
                } else if ($user->status == 'pending') {
                    return $this->sendError('Your account is pending approval from admin', null);
                } else if ($user->status == 'block') {
                    return $this->sendError('Your account has been blocked.', null);
                }
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                $token->save();
                // $hashKey = hash_hmac('sha256', $user->email, env("ONESIGNAL_APP_ID"));

                $data['access_token'] = $tokenResult->accessToken;
                $data['token_type'] = 'Bearer';
                $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                $data['user'] = $user;
                // $data['oneSignalHash'] = $hashKey;
                DB::commit();
                return $this->sendSuccess('User Login Successfully', $data);
            } else {
                if ($request->has('avatar')) {
                    $image = $request->file('avatar');
                    $extension = $image->getClientOriginalExtension();
                    $name = Str::random(5);
                    $folder = 'uploads/profile/';
                    $filePath = $folder . $name . '.' . $extension;
                    $destinationPath = public_path($folder);
                    $image->move($destinationPath, $name . '.' . $extension);
                    $user_data['profile_img'] = $filePath;
                } else {
                    $user_data['profile_img'] = null;
                }
                $user_data['full_name'] = $request->full_name;
                $user_data['email'] = $request->email;
                $user_data['status'] = 'active';
                $user_data['social_platform'] = 'google';
                $user_data['google_id'] = $request->google_id;

                $user = User::create($user_data);
                // ------Token after register
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                $token->save();
                // $hashKey = hash_hmac('sha256', $user->email, env("ONESIGNAL_APP_ID"));

                $data['access_token'] = $tokenResult->accessToken;
                $data['token_type'] = 'Bearer';
                $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                $data['user'] = $user;
                // $data['oneSignalHash'] = $hashKey;
                DB::commit();
                return $this->sendSuccess('User created', $data);
            }
        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }
    }

    public function userSocialLogin(Request $request)
    {
        $request->validate([
            'full_name' => 'sometimes',
            'email' => 'required',
            'phyllo_token' => 'required',
            'phyllo_user_id' => 'required',
            'phyllo_token_expiration' => 'required',
            'google_id' => 'sometimes',
            'facebook_id' => 'sometimes',
            'is_google' => 'sometimes',
            'is_facebook' => 'sometimes',
            'is_apple' => 'sometimes',
            'apple_id' => 'sometimes',
            'avatar' => 'sometimes',
        ]);
        DB::beginTransaction();

        try {
            if ($request->is_apple && $request->apple_id) {
                $user = User::where('apple_id', $request->apple_id)->first();
                if ($user) {
                    if ($user->status == 'inactive') {
                        return $this->sendError('Please verify your email to continue.', null);
                    } else if ($user->status == 'pending') {
                        return $this->sendError('Your account is pending approval from admin', null);
                    } else if ($user->status == 'block') {
                        return $this->sendError('Your account has been blocked.', null);
                    }
                    $tokenResult = $user->createToken('Personal Access Token');
                    $token = $tokenResult->token;
                    $token->save();
                    $hashKey = hash_hmac('sha256', $user->email, env("ONESIGNAL_APP_ID"));

                    $data['access_token'] = $tokenResult->accessToken;
                    $data['token_type'] = 'Bearer';
                    $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                    $data['user'] = $user;
                    $data['oneSignalHash'] = $hashKey;
                    DB::commit();
                    return response()->json(['statusCode' => 200, 'Message' => 'User Login Successfully', 'Data' => $data]);
                } else {
                    $user = User::where('email', $request->email)->first();
                    if ($user) {
                        $user['apple_id'] = $request->apple_id;
                        $user->update();
                        $tokenResult = $user->createToken('Personal Access Token');
                        $token = $tokenResult->token;
                        $token->save();
                        $hashKey = hash_hmac('sha256', $user->email, env("ONESIGNAL_APP_ID"));

                        $data['access_token'] = $tokenResult->accessToken;
                        $data['token_type'] = 'Bearer';
                        $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                        $data['user'] = $user;
                        $data['oneSignalHash'] = $hashKey;
                        DB::commit();
                        return response()->json(['statusCode' => 200, 'Message' => 'User Login Successfully', 'Data' => $data]);
                    } else {
                        $user_data['full_name'] = $request->full_name;
                        $user_data['email'] = $request->email;
                        $user_data['apple_id'] = $request->apple_id;
                        $user_data['social_platform'] = 'apple';
                        $user_data['status'] = 'active';
                        $user_data['phyllo_token'] = $request->phyllo_token;
                        $user_data['phyllo_user_id'] = $request->phyllo_user_id;
                        $user_data['phyllo_token_expiration'] = $request->phyllo_token_expiration;

                        $user = User::create($user_data);

                        $wallet = new InfluencerWallet;
                        $wallet->user_id = $user->id;
                        $wallet->save();

                        $hashKey = hash_hmac('sha256', $request->email, env("ONESIGNAL_APP_ID"));
                        // -----Token After Registration
                        $tokenResult = $user->createToken('Personal Access Token');
                        $token = $tokenResult->token;
                        $token->save();
                        $data['access_token'] = $tokenResult->accessToken;
                        $data['token_type'] = 'Bearer';
                        $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                        $data['user'] = $user;
                        $data['oneSignalHash'] = $hashKey;

                        DB::commit();
                        return response()->json(['statusCode' => 200, 'Message' => 'User Login Successfully', 'Data' => $data]);
                    }
                }
            } else {
                $user = User::where('email', $request->email)->first();

                if ($user) {
                    if ($user->status == 'inactive') {
                        $code = mt_rand(100000, 999999);
                        $user->reset_password = $code;
                        $user->save();

                        $data['phone'] = $user->phone;
                        $data['msg'] = 'Your reset password OTP verification code for Snapwork ' . $code . ' . Please do not share this code to anyone.';
                        $data['name'] = $user->full_name;
                        try {
                            $this->sendSms($data['msg'], $data['phone']);
                            return $this->sendError('Please verify your phone to continue.', null);
                        } catch (\Exception$e) {
                            return $this->sendError("Something went wrong", null);
                        }
                    } else if ($user->status == 'pending') {
                        return $this->sendError('Your account is pending approval from admin', null);
                    } else if ($user->status == 'block') {
                        return $this->sendError('Your account has been blocked.', null);
                    }
                    $tokenResult = $user->createToken('Personal Access Token');
                    $token = $tokenResult->token;
                    $token->save();
                    $hashKey = hash_hmac('sha256', $user->email, env("ONESIGNAL_APP_ID"));

                    $data['access_token'] = $tokenResult->accessToken;
                    $data['token_type'] = 'Bearer';
                    $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                    $data['user'] = $user;
                    $data['oneSignalHash'] = $hashKey;
                    DB::commit();
                    return $this->sendSuccess('User Login Successfully', $data);
                } else {
                    if ($request->has('avatar')) {
                        $image = $request->file('avatar');
                        $extension = $image->getClientOriginalExtension();
                        $name = Str::random(15);
                        $folder = 'uploads/profile/';
                        $filePath = $folder . $name . '.' . $extension;
                        $destinationPath = public_path($folder);
                        $image->move($destinationPath, $name . '.' . $extension);
                        $user_data['profile_img'] = $filePath;
                    } else {
                        $user_data['profile_img'] = null;
                    }
                    $user_data['full_name'] = $request->full_name;
                    $user_data['email'] = $request->email;
                    $user_data['status'] = 'inactive';
                    $user_data['phyllo_token'] = $request->phyllo_token;
                    $user_data['phyllo_user_id'] = $request->phyllo_user_id;
                    $user_data['phyllo_token_expiration'] = $request->phyllo_token_expiration;

                    if ($request->is_google) {
                        $user_data['social_platform'] = 'google';
                        $user_data['google_id'] = $request->google_id;
                    } elseif ($request->is_facebook) {
                        $user_data['social_platform'] = 'facebook';
                        $user_data['facebook_id'] = $request->facebook_id;
                    }
                    $user = User::create($user_data);
                    // ------Token after register
                    $wallet = new InfluencerWallet;
                    $wallet->user_id = $user->id;
                    $wallet->save();

                    Auth::login($user);

                    $tokenResult = $user->createToken('Personal Access Token');
                    $token = $tokenResult->token;
                    $token->save();

                    $data['access_token'] = $tokenResult->accessToken;
                    $data['token_type'] = 'Bearer';
                    $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                    $data['user'] = $user;
                    $hashKey = hash_hmac('sha256', $user->email, env("ONESIGNAL_APP_ID"));
                    $data['oneSignalHash'] = $hashKey;
                    DB::commit();

                    return $this->sendSuccess('Successfully Registerd', $data);

                }
            }
        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return response()->json(['statusCode' => 500, 'Message' => 'Database Error Contact Support', 'Data' => '']);
            }
        }
    }

    public function sendSocialOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => "required|unique:users,phone",
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        $user = User::find(Auth::id());
        if ($user) {
            DB::beginTransaction();
            $code = mt_rand(100000, 999999);
            $user->phone = $request->phone;
            $user->otp = $code;
            $user->phone_verified_at = null;
            $user->status = 'inactive';
            if ($user->update()) {
                $data['phone'] = $user->phone;
                $data['full_name'] = $user->full_name;
                $data['msg'] = 'Welcome to Snapwork: Verify your phone using this code: ' . $code . ' . Please do not share this code to anyone.';
                try {
                    $this->sendSms($data['msg'], $data['phone']);
                    DB::commit();
                    return $this->sendSuccess('OTP Code Sent', $data);
                } catch (\Exception$e) {
                    DB::rollback();
                    return $this->sendError("Something went wrong", null);
                }

            } else {
                return $this->sendError('Something went wrong, Please try again', null);
            }
        } else {
            return $this->sendError('No User Found, Registered With This Phone', null);
        }
    }

    public function deleteUserOTP(Request $request)
    {
        try {

            DB::beginTransaction();
            $user = Auth::user();
            $code = mt_rand(100000, 999999);
            $user->otp = $code;
            $user->update();
            $data['phone'] = $user->phone;
            $data['full_name'] = $user->full_name;
            $data['msg'] = 'Welcome to Snapwork: Verify your phone using this code: ' . $code . ' . Please do not share this code to anyone.';
            $this->sendSms($data['msg'], $data['phone']);
            DB::commit();
            return $this->sendSuccess('OTP Code Sent', $data);
        } catch (\Exception$e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function deleteUser(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();

            if ($user->otp == $request->otp) {

                Token::where('user_id', Auth::id())->where('name', 'Personal Access Token')
                    ->update(['revoked' => true]);

                $user->status = 'deleted';
                $user->update();

                DB::commit();
                return $this->sendSuccess("User Deleted", null);
            }

            return $this->sendError('Incorrect Otp', null);
        } catch (\Exception$e) {
            DB::rollback();
            return $this->sendError('No User Found', null);
        }
    }

}
