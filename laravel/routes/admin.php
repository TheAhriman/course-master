<?php

use App\Http\Controllers\AboutCourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\LessonContentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionGroupController;
use App\Http\Controllers\QuestionResponseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScaleCriteriaController;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\UserController;
use App\Models\Course;
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

Route::middleware('role:admin|creator')->group(function() {
    Route::get('/',function () { return view('layouts.admin_panel.admin_panel'); })->name('admin');

    Route::resource('categories', CategoryController::class);
    Route::prefix('categories_trashed')
        ->name('categories.')
        ->controller(CategoryController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{category}','showTrashed')->name('show_trashed');
            Route::get('/{category}/restore','restore')->name('restore');
        });

    Route::resource('users', UserController::class);
    Route::prefix('user_trashed')
        ->name('users.')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{user}','showTrashed')->name('show_trashed');
            Route::get('/{user}/restore','restore')->name('restore');
        });

    Route::resource('roles', RoleController::class);
    Route::prefix('roles_trashed')
        ->name('roles.')
        ->controller(RoleController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{role}','showTrashed')->name('show_trashed');
            Route::get('/{role}/restore','restore')->name('restore');
        });

    Route::resource('permissions', PermissionController::class);
    Route::prefix('permissions_trashed')
        ->name('permissions.')
        ->controller(PermissionController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{permission}','showTrashed')->name('show_trashed');
            Route::get('/{permission}/restore','restore')->name('restore');
        });

    Route::resource('examinations', ExaminationController::class);
    Route::prefix('examinations_trashed')
        ->name('examinations.')
        ->controller(ExaminationController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{examination}','showTrashed')->name('show_trashed');
            Route::get('/{examination}/restore','restore')->name('restore');
        });

    Route::resource('criterias', ScaleCriteriaController::class);
    Route::prefix('criterias_trashed')
        ->name('criterias.')
        ->controller(ScaleCriteriaController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{criteria}','showTrashed')->name('show_trashed');
            Route::get('/{criteria}/restore')->name('restore');
        });

    Route::resource('comments', CommentController::class);
    Route::prefix('comments_trashed')
        ->name('comments.')
        ->controller(CommentController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{comment}','showTrashed')->name('show_trashed');
            Route::get('/{comment}/restore','restore')->name('restore');
        });

    Route::resource('question_groups', QuestionGroupController::class);
    Route::prefix('question_groups_trashed')
        ->name('question_groups.')
        ->controller(QuestionGroupController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{question_group}','showTrashed')->name('show_trashed');
            Route::get('/{question_group}/restore','restore')->name('restore');
        });

    Route::resource('questions', QuestionController::class);
    Route::prefix('question_trashed')
        ->name('questions.')
        ->controller(QuestionController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{question}','showTrashed')->name('show_trashed');
            Route::get('/{question}/restore','restore')->name('restore');
        });

    Route::resource('question_responses', QuestionResponseController::class);
    Route::prefix('question_responses_trashed')
        ->name('question_responses.')
        ->controller(QuestionResponseController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{question_response}','showTrashed')->name('show_trashed');
            Route::get('/{question_response}/restore','restore')->name('restore');
        });

    Route::resource('user_answers', UserAnswerController::class);
    Route::prefix('user_answers_trashed')
        ->name('user_answers.')
        ->controller(UserAnswerController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{user_answer}','showTrashed')->name('show_trashed');
            Route::get('/{user_answer}/restore','restore')->name('restore');
        });

    Route::resource('lesson_contents', LessonContentController::class);
    Route::prefix('lesson_contents_trashed')
        ->name('lesson_contents.')
        ->controller(LessonContentController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{lesson_content}','showTrashed')->name('show_trashed');
            Route::get('/{lesson_content}/restore','restore')->name('restore');
        });

    Route::resource('courses', CourseController::class);
    Route::prefix('courses_trashed')
        ->name('courses.')
        ->controller(CourseController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed')->can('viewAny',[Course::class]);
            Route::get('/{course}','showTrashed')->name('show_trashed');
            Route::get('/{course}/restore','restore')->name('restore');
        });
    Route::prefix('courses/{course}')
        ->group(function () {
            Route::controller(AboutCourseController::class)
                ->name('about_courses.')
                ->group(function () {
                    Route::prefix('about_courses')
                        ->group(function () {
                            Route::get('/create','create')->name('create');
                            Route::post('/','store')->name('store');
                        });
                    Route::prefix('{about_course}')
                        ->group(function () {
                            Route::get('/edit','edit')->name('edit');
                            Route::patch('/','update')->name('update');
                        });
                });
            Route::prefix('lessons')
                ->name('lessons.')
                ->controller(LessonController::class)
                ->group(function () {
                    Route::get('/create','create')->name('create');
                    Route::post('/','store')->name('store');
                });
        });

    Route::resource('lessons', LessonController::class)->except(['create','store']);
    Route::prefix('lessons_trashed')
        ->name('lessons.')
        ->controller(LessonController::class)
        ->group(function () {
            Route::get('/','indexTrashed')->name('index_trashed');
            Route::get('/{lesson}','showTrashed')->name('show_trashed');
            Route::get('/{lesson}/restore','restore')->name('restore');
        });
});


