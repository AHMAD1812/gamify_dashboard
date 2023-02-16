<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiControllers\AuthController;
use App\Http\Controllers\ApiControllers\ChatController;
use App\Http\Controllers\ApiControllers\UserController;
use App\Http\Controllers\ApiControllers\CourseController;
use App\Http\Controllers\ApiControllers\CategoryController;
use App\Http\Controllers\ApiControllers\FavouriteCourseController;

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
Route::post('login', [AuthController::class, 'login']);
//Verify Email API's
Route::post('verify_email', [AuthController::class, 'verifyEmail']);
Route::post('resend_otp', [AuthController::class, 'resendOtp']);
//Forgot Password API's
Route::post('send_forgot_password_code', [AuthController::class, 'sendforgotPasswordCode']);
Route::post('verify_forgot_password_code', [AuthController::class, 'verifyForgotPasswordCode']);
Route::post('resend_forgot_password_otp', [AuthController::class, 'resendForgotPasswordOtp']);
Route::post('change_password', [AuthController::class, 'changePassword']);
//Social Login API's
Route::post('social_login', [AuthController::class, 'socialLogin']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('get_user', [UserController::class, 'getUser']);
    Route::post('update_profile', [UserController::class, 'updateProfile']);
    Route::post('reset_password', [AuthController::class, 'resetPassword']);

    //Categories
    Route::get('get_categories', [CategoryController::class, 'getAllCategories']);
    Route::get('get_user_categories', [CategoryController::class, 'getUserCategories']);
    Route::post('add_categories', [CategoryController::class, 'addCategories']);
    Route::post('update_categories', [CategoryController::class, 'updateCategories']);
    
    // Courses
    Route::get('get_courses', [CourseController::class, 'getCourses']);
    Route::post('get_course_detail', [CourseController::class, 'getCourseDetail']);

    //favourite courses api
    Route::get('get_favourite_courses', [FavouriteCourseController::class, 'getFavouriteCourses']);
    Route::post('add_favourite_course', [FavouriteCourseController::class, 'addCourseFavourite']);
    Route::post('remove_favourite_course', [FavouriteCourseController::class, 'removeCourseFavourite']);

    //Chat Routes
    Route::post('/initiate_chat', [ChatController::class, 'initiate_chat']);
    Route::post('/get_current_chats', [ChatController::class, 'get_current_chats']);
    Route::post('/add_message', [ChatController::class, 'add_message']);
    Route::post('/get_chat', [ChatController::class, 'get_chat']);
    Route::post('/seen_all_messages', [ChatController::class, 'seen_all_messages']);
    Route::post('/delete_message', [ChatController::class, 'delete_message']);
    Route::post('/delete_chat', [ChatController::class, 'delete_chat']);
    Route::post('/chat_search', [ChatController::class, 'chat_search']);
    Route::post('/find_chat', [ChatController::class, 'find_chat']);
    Route::post('/get_unread_count', [ChatController::class, 'get_unread_count']);

    // chat unused route
    Route::post('/create_chat', [ChatController::class, 'create_chat']);

});
