<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\AuthController::class,'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', [\App\Http\Controllers\AuthController::class,'emailVerificationNotice'])->middleware('auth')->name('verification.notice');
Route::post('/email/verification-notification',[\App\Http\Controllers\AuthController::class,'resendVerificationMail'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
Route::post('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/register',[\App\Http\Controllers\AuthController::class,'showRegisterForm'])->name('register')->middleware('guest');
Route::get('/login',[\App\Http\Controllers\AuthController::class,'showLoginForm'])->name('login')->middleware('guest');
Route::post('/register_processing',[\App\Http\Controllers\AuthController::class,'register'])->name('register_processing')->middleware('guest');
Route::post('/login_processing',[\App\Http\Controllers\AuthController::class,'login'])->name('login_processing')->middleware('guest');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',function () {return view('layouts.app'); });
Route::get('/course',[\App\Http\Controllers\CourseViewController::class,'show']);
