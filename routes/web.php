<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'index']);
Route::get('/login', [PageController::class, 'index']);
Route::get('/register', [PageController::class, 'index']);
Route::get('/forgot_password', [PageController::class, 'index']);
Route::get('/courses', [PageController::class, 'index']);
Route::get('/create_video', [PageController::class, 'index']);
Route::get('/messages', [PageController::class, 'index']);
Route::get('/notification', [PageController::class, 'index']);
Route::get('/reviews', [PageController::class, 'index']);
Route::get('/profile', [PageController::class, 'index']);
