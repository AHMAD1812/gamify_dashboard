<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
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
    Route::get('/dashboard', [PageController::class, 'index']);
    Route::get('/login', [PageController::class, 'index'])->name('instructor.login');
    Route::get('/register', [PageController::class, 'index'])->name('instructor.register');
    Route::get('/forgot_password', [PageController::class, 'index']);
    Route::get('/courses', [PageController::class, 'index']);
    Route::get('/create_video', [PageController::class, 'index']);
    Route::get('/messages', [PageController::class, 'index']);
    Route::get('/notification', [PageController::class, 'index']);
    Route::get('/reviews', [PageController::class, 'index']);
    Route::get('/profile', [PageController::class, 'index']);
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
});