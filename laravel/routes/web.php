<?php

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
Route::get('/admin',function (){return view('layouts.admin_panel.admin_panel');})->name('admin');
Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');

Route::get('/',function () {return view('layouts.app'); });
Route::get('/register',[\App\Http\Controllers\AuthController::class,'showRegisterForm'])->name('register');
Route::get('/login',[\App\Http\Controllers\AuthController::class,'showLoginForm'])->name('login');
Route::post('/register_processing',[\App\Http\Controllers\AuthController::class,'register'])->name('register_processing');
Route::post('/login_processing',[\App\Http\Controllers\AuthController::class,'login'])->name('login_processing');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
