<?php

use App\Http\Controllers\Admin\UserProgressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
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


Route::prefix('email')
    ->name('verification.')
    ->controller(AuthController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/verify/{id}/{hash}','verifyEmail')->middleware('signed')->name('verify');
        Route::get('/verify','emailVerificationNotice')->name('notice');
        Route::post('/verification-notification','resendVerificationMail')->middleware('throttle:6,1')->name('resend');
    });

Route::middleware('guest')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/register','showRegisterForm')->name('register');
        Route::get('/login','showLoginForm')->name('login');
        Route::post('/register_processing','register')->name('register_processing');
        Route::post('/login_processing','login')->name('login_processing');
    });

Route::get('/courses',[CourseController::class,'index'])->name('courses.index');
Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',function () {return view('layouts.app'); });

Route::prefix('lessons/{lesson}')
	->name('lessons.')
	->controller(LessonController::class)
	->group(function () {
		Route::get('/','show')->name('show')->middleware('can:show,lesson');
		Route::patch('/finished','setLessonFinished')->name('finished')->middleware('can:confirm,lesson');
	});

Route::get('/admin/user_progresses/create',[UserProgressController::class,'create'])->name('admin.user_progresses.create');
