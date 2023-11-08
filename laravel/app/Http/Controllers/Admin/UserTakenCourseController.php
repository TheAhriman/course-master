<?php

namespace App\Http\Controllers\Admin;

use App\DTO\UpdateUserProgressDTO;
use App\Http\Controllers\Controller;
use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use App\Http\Services\UserTakenCourseService;
use App\Models\UserProgress;
use App\Models\UserTakenCourse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserTakenCourseController extends Controller
{
    public function __construct(
        private readonly UserTakenCourseService $takenCourseService,
        private readonly CourseService $courseService,
        private readonly LessonService $lessonService
    )
    {
    }

    public function index()
    {
        Auth::user()->hasRole('admin')
            ? $data = $this->takenCourseService->paginate()
            : $data = $this->takenCourseService->waiting($this->courseService->getAllByAuthor(Auth::id()))->paginate();

        return view('admin_panel.user_taken_courses.index', compact('data'));
    }




    public function confirmLesson(UserTakenCourse $userTakenCourse)
    {
        $this->takenCourseService->updateToNext($userTakenCourse, $this->lessonService->getLessonsFromCourseWithPriority($userTakenCourse   ->course_id));

        return redirect()->route('admin.user_taken_courses.index');
    }
}
