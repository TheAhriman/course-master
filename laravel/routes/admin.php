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

Route::resource('examinations',\App\Http\Controllers\ExaminationController::class);
Route::get('/examinations_trashed',[\App\Http\Controllers\ExaminationController::class,'indexTrashed'])->name('examinations.index_trashed');
Route::get('/examinations_trashed/{examination}',[\App\Http\Controllers\ExaminationController::class,'showTrashed'])->name('examinations.show_trashed');
Route::get('/examinations_trashed/{examination}/restore',[\App\Http\Controllers\ExaminationController::class,'restore'])->name('examinations.restore');

Route::resource('criterias',\App\Http\Controllers\ScaleCriteriaController::class);
Route::get('/criterias_trashed',[\App\Http\Controllers\ScaleCriteriaController::class,'indexTrashed'])->name('criterias.index_trashed');
Route::get('/criterias_trashed/{criteria}',[\App\Http\Controllers\ScaleCriteriaController::class,'showTrashed'])->name('criterias.show_trashed');
Route::get('/criterias_trashed/{criteria}/restore',[\App\Http\Controllers\ScaleCriteriaController::class,'restore'])->name('criterias.restore');

Route::resource('comments',\App\Http\Controllers\CommentController::class);
Route::get('/comments_trashed',[\App\Http\Controllers\CommentController::class,'indexTrashed'])->name('comments.index_trashed');
Route::get('/comments_trashed/{comment}',[\App\Http\Controllers\CommentController::class,'showTrashed'])->name('comments.show_trashed');
Route::get('/comments_trashed/{comment}/restore',[\App\Http\Controllers\CommentController::class,'restore'])->name('comments.restore');

Route::resource('question_groups',\App\Http\Controllers\QuestionGroupController::class);
Route::get('/question_groups_trashed',[\App\Http\Controllers\QuestionGroupController::class,'indexTrashed'])->name('question_groups.index_trashed');
Route::get('/question_groups_trashed/{question_group}',[\App\Http\Controllers\QuestionGroupController::class,'showTrashed'])->name('question_groups.show_trashed');
Route::get('/question_groups_trashed/{question_group}/restore',[\App\Http\Controllers\QuestionGroupController::class,'restore'])->name('question_groups.restore');

Route::resource('questions',\App\Http\Controllers\QuestionController::class);
Route::get('/questions_trashed',[\App\Http\Controllers\QuestionController::class,'indexTrashed'])->name('questions.index_trashed');
Route::get('/questions_trashed/{question}',[\App\Http\Controllers\QuestionController::class,'showTrashed'])->name('questions.show_trashed');
Route::get('/questions_trashed/{question}/restore',[\App\Http\Controllers\QuestionController::class,'restore'])->name('questions.restore');

Route::resource('question_responses',\App\Http\Controllers\QuestionResponseController::class);
Route::get('/question_responses_trashed',[\App\Http\Controllers\QuestionResponseController::class,'indexTrashed'])->name('question_responses.index_trashed');
Route::get('/question_responses_trashed/{question_response}',[\App\Http\Controllers\QuestionResponseController::class,'showTrashed'])->name('question_responses.show_trashed');
Route::get('/question_responses_trashed/{question_response}/restore',[\App\Http\Controllers\QuestionResponseController::class,'restore'])->name('question_responses.restore');

Route::resource('user_answers',\App\Http\Controllers\UserAnswerController::class);
Route::get('/user_answers_trashed',[\App\Http\Controllers\UserAnswerController::class,'indexTrashed'])->name('user_answers.index_trashed');
Route::get('/user_answers_trashed/{user_answer}',[\App\Http\Controllers\UserAnswerController::class,'showTrashed'])->name('user_answers.show_trashed');
Route::get('/user_answers_trashed/{user_answer}/restore',[\App\Http\Controllers\UserAnswerController::class,'restore'])->name('user_answers.restore');

Route::resource('lesson_contents',\App\Http\Controllers\LessonContentController::class);
Route::get('/lesson_contents_trashed',[\App\Http\Controllers\LessonContentController::class,'indexTrashed'])->name('lesson_contents.index_trashed');
Route::get('/lesson_contents_trashed/{lesson_content}',[\App\Http\Controllers\LessonContentController::class,'showTrashed'])->name('lesson_contents.show_trashed');
Route::get('/lesson_contents_trashed/{lesson_content}/restore',[\App\Http\Controllers\LessonContentController::class,'restore'])->name('lesson_contents.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
