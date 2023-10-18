<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('categories',\App\Http\Controllers\CategoryController::class);
Route::get('/categories_trashed',[\App\Http\Controllers\CategoryController::class,'indexTrashed'])->name('categories.index_trashed');
Route::get('/categories_trashed/{category}',[\App\Http\Controllers\CategoryController::class,'showTrashed'])->name('categories.show_trashed');
Route::get('/categories_trashed/{category}/restore',[\App\Http\Controllers\CategoryController::class,'restore'])->name('categories.restore');

Route::resource('courses',\App\Http\Controllers\CourseController::class);
Route::get('/courses_trashed',[\App\Http\Controllers\CourseController::class,'indexTrashed'])->name('courses.index_trashed');
Route::get('/courses_trashed/{course}',[\App\Http\Controllers\CourseController::class,'showTrashed'])->name('courses.show_trashed');
Route::get('/courses_trashed/{course}/restore',[\App\Http\Controllers\CourseController::class,'restore'])->name('courses.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
