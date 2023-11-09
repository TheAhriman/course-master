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

Route::get('/course-detailes', function () {
    return view('course-detailes');})->name('course-detailes');

Route::get('/courses', function () {
    return view('courses');})->name('courses');

Route::get('/courses-catalog', function () {
    return view(('courses-catalog'));})->name('courses-catalog');;

Route::get('/my-courses-statistics', function () {
    return view(('my-courses-statistics'));})->name('my-courses-statistics');;

Route::get('/my-courses-progress', function () {
    return view(('my-courses-progress'));})->name('my-courses-progress');

Route::get('/course-quiz',function (){
    return view('course-quiz');})->name('course-quiz');

Route::get('/notifications', function (){
    return view('notifications');})->name('notifications');

Route::get('/course-index',function (){
    return view('course-index');})->name('course-index');
Route::get('/index',function (){
    return view('index');})->name('index');
