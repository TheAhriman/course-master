<?php

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

Route::resource('posts',\App\Http\Controllers\PostController::class)->except('destroy');
Route::get('/posts_trashed',[\App\Http\Controllers\PostController::class,'indexTrashed'])->name('posts.indexTrashed');
Route::get('/posts_trashed/{post}',[\App\Http\Controllers\PostController::class,'showTrashed'])->name('posts.showTrashed');
Route::delete('/posts/{post}/{permanent?}',[\App\Http\Controllers\PostController::class,'destroy'])->name('posts.destroy');

Route::resource('categories',\App\Http\Controllers\CategoryController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
