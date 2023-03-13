<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\NotificationController;
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

Route::prefix('admin')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/teacher', [AdminController::class, 'teacher'])->name('admin.teacher');
    Route::get('/student', [AdminController::class, 'student'])->name('admin.student');
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::get('/forgot', [AdminController::class, 'forgot'])->name('admin.forgot');
});


Route::prefix('instructor')->group(function () {

    //Authentication Auth Api
    
    Route::get('/login', [PageController::class, 'index'])->name('instructor.login');
    Route::get('/register', [PageController::class, 'index'])->name('instructor.register');
    Route::post('/register_process', [AuthController::class, 'Register']);
    Route::post('/is_email_available', [AuthController::class, 'isEmailAvailable']);
    Route::post('/login_process', [AuthController::class, 'Login']);
    Route::post('/otp_verification', [AuthController::class, 'OtpVerification']);
    Route::get('/forgot_password', [PageController::class, 'index']);
    Route::get('/courses', [PageController::class, 'index']);
    Route::get('/create_video', [PageController::class, 'index']);
    Route::get('/messages', [PageController::class, 'index']);
    Route::get('/notification', [PageController::class, 'index']);
    Route::get('/reviews', [PageController::class, 'index']);
    Route::get('/profile', [PageController::class, 'index']);
    
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
        Route::get('/course_detail/{id}', [PageController::class, 'index']);
        Route::get('/feedback', [PageController::class, 'index']);

        //API Docs
        
        //Course 
        Route::post('/add_course', [CourseController::class, 'addCourse']);
        Route::get('/get_courses', [CourseController::class, 'getCourses']);
        Route::get('/get_course_detail/{id}', [CourseController::class, 'getCourseDetail']);
        Route::post('/delete_course', [CourseController::class, 'deleteCourse']);
        
        //Chat Controller
        Route::post('/get_current_chats', [ChatController::class, 'get_current_chats']);
        Route::post('/add_message', [ChatController::class, 'add_message']);
        Route::post('/get_chat', [ChatController::class, 'get_chat']);
        Route::post('/chat_request', [ChatController::class, 'chat_request']);

        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user_profile', [UserController::class, 'getUser']);
        Route::post('/update_profile', [UserController::class, 'updateUser']);

        Route::get('/get_dashboard_data', [DataController::class, 'getDashabordData']);

        Route::get('/get_notifications',[NotificationController::class, 'getNotifications']);

        Route::get('/get_reviews',[ReviewController::class, 'getReviews']);

        Route::post('/add_feedback',[FeedbackController::class, 'addFeedback']);
        
    });



    // API Routes
    Route::get('/get_categories', [DataController::class, 'getCategories']);
});