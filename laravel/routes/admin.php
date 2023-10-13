<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

Route::resource('posts', PostController::class)->except('destroy');
Route::get('/posts_trashed',[PostController::class,'indexTrashed'])->name('posts.indexTrashed');
Route::get('/posts_trashed/{post}',[PostController::class,'showTrashed'])->name('posts.showTrashed');
Route::delete('/posts/{post}/{permanent?}',[PostController::class,'destroy'])->name('posts.destroy');

Route::resource('categories', CategoryController::class)->except('destroy');
Route::get('/categories_trashed',[CategoryController::class,'indexTrashed'])->name('categories.indexTrashed');
Route::get('/categories_trashed/{category}',[CategoryController::class,'showTrashed'])->name('categories.showTrashed');
Route::delete('/categories/{category}/{permanent?}',[CategoryController::class,'destroy'])->name('categories.destroy');

Route::resource('tags', TagController::class)->except('destroy');
Route::get('/tags_trashed',[TagController::class,'indexTrashed'])->name('tags.indexTrashed');
Route::get('/tags_trashed/{tag}',[TagController::class,'showTrashed'])->name('tags.showTrashed');
Route::delete('/tags/{tag}/{permanent?}',[TagController::class,'destroy'])->name('tags.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
