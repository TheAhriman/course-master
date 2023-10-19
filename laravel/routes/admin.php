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

Route::resource('users',\App\Http\Controllers\UserController::class);
Route::get('/users_trashed',[\App\Http\Controllers\UserController::class,'indexTrashed'])->name('users.index_trashed');
Route::get('/users_trashed/{user}',[\App\Http\Controllers\UserController::class,'showTrashed'])->name('users.show_trashed');
Route::get('/users_trashed/{user}/restore',[\App\Http\Controllers\UserController::class,'restore'])->name('users.restore');

Route::resource('roles',\App\Http\Controllers\RoleController::class);
Route::get('/roles_trashed',[\App\Http\Controllers\RoleController::class,'indexTrashed'])->name('roles.index_trashed');
Route::get('/roles_trashed/{role}',[\App\Http\Controllers\RoleController::class,'showTrashed'])->name('roles.show_trashed');
Route::get('/roles_trashed/{role}/restore',[\App\Http\Controllers\RoleController::class,'restore'])->name('roles.restore');

Route::resource('permissions',\App\Http\Controllers\PermissionController::class);
Route::get('/permissions_trashed',[\App\Http\Controllers\PermissionController::class,'indexTrashed'])->name('permissions.index_trashed');
Route::get('/permissions_trashed/{permission}',[\App\Http\Controllers\PermissionController::class,'showTrashed'])->name('permissions.show_trashed');
Route::get('/permissions_trashed/{permission}/restore',[\App\Http\Controllers\PermissionController::class,'restore'])->name('permissions.restore');

Route::resource('lessons',\App\Http\Controllers\LessonController::class);
Route::get('/lessons_trashed',[\App\Http\Controllers\LessonController::class,'indexTrashed'])->name('lessons.index_trashed');
Route::get('/lessons_trashed/{lesson}',[\App\Http\Controllers\LessonController::class,'showTrashed'])->name('lessons.show_trashed');
Route::get('/lessons_trashed/{lesson}/restore',[\App\Http\Controllers\LessonController::class,'restore'])->name('lessons.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
