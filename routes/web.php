<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AppController::class, 'index'])->name('app');
Route::get('/about-us', [AppController::class, 'about'])->name('about');
Route::get('/contact-us', [AppController::class, 'contact'])->name('contact');

Route::prefix('instructor')->group(function () {


    //Authentication Auth Api
    
    Route::get('/login', [PageController::class, 'index'])->name('instructor.login');
    Route::get('/register', [PageController::class, 'index'])->name('instructor.register');
    Route::post('/register_process', [AuthController::class, 'Register']);
    Route::post('/is_email_available', [AuthController::class, 'isEmailAvailable']);
    Route::post('/login_process', [AuthController::class, 'Login']);
    Route::post('/otp_verification', [AuthController::class, 'OtpVerification']);
    Route::get('/forgot_password', [PageController::class, 'index']);
    Route::get('/otp_verification', [PageController::class, 'index']);
    Route::get('/is_user_login', [AuthController::class, 'islogin']);
    // Instructor Auth
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', [PageController::class, 'index'])->name('instructor.dashboard');
        Route::get('/courses', [PageController::class, 'index']);
        Route::get('/create_video', [PageController::class, 'index']);
        Route::get('/messages', [PageController::class, 'index']);
        Route::get('/notification', [PageController::class, 'index']);
        Route::get('/reviews', [PageController::class, 'index']);
        Route::get('/profile', [PageController::class, 'index']);
        Route::get('/setting', [PageController::class, 'index']);
        Route::get('/course_detail', [PageController::class, 'index']);

        //API Doces
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/profile', [UserController::class, 'getUser']);
    });



    // API Routes
    Route::get('/get_categories', [DataController::class, 'getCategories']);
});