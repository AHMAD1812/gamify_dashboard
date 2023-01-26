<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiControllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('register', [AuthController::class, 'register']);
Route::post('login_in', [AuthController::class, 'login']);
Route::post('verify_email', [AuthController::class, 'verifyEmail']);
Route::post('resend_otp', [AuthController::class, 'resendOtp']);
Route::post('forgot_password', [AuthController::class, 'forgotPassword']);
Route::post('forgot_password_code', [AuthController::class, 'forgotPasswordCode']);
Route::post('new_password', [AuthController::class, 'resetPassword']);
Route::post('social_login', [AuthController::class, 'userSocialLogin']);
Route::post('resend_forgot_pass_otp', [AuthController::class, 'resendForgotPasswordOtp']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('get_user', [AuthController::class, 'getUser']);
    Route::post('update_profile', [UserController::class, 'updateProfile']);
    Route::get('interests', [UserController::class, 'getAllInterest']);
    Route::post('delete_interest', [UserController::class, 'deleteInterest']);
    Route::post('add_interests', [UserController::class, 'updateInterest']);
    
    //Chat Routes
    // Route::post('/create_chat', [ChatController::class, 'create_chat']);
    // Route::post('/add_message', [ChatController::class, 'add_message']);
    // Route::post('/get_chat', [ChatController::class, 'get_chat']);
    // Route::post('/seen_message', [ChatController::class, 'seen_message']);
    // Route::post('/delete_message', [ChatController::class, 'delete_message']);
    // Route::post('/delete_chat', [ChatController::class, 'delete_chat']);
    // Route::post('/chat_search', [ChatController::class, 'chat_search']);
    // Route::post('/find_chat', [ChatController::class, 'find_chat']);
    // Route::post('/get_current_chats', [ChatController::class, 'get_current_chats']);
    // Route::post('/get_unread_count', [ChatController::class, 'get_unread_count']);
    // Route::post('/initiate_chat', [ChatController::class, 'initiate_chat']);

});
