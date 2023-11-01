<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateUserProgressDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserProgressRequest;
use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use App\Http\Services\UserProgressService;
use App\Http\Services\UserService;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Auth;

class UserProgressController extends Controller
{
    public function __construct(
        private readonly UserProgressService $progressService,
        private readonly LessonService $lessonService,
        private readonly UserService $userService,
        private readonly CourseService $courseService
    )
    {
    }

    public function index()
    {
        Auth::user()->hasRole('admin')
            ? $data = $this->progressService->paginate()
            : $data = $this->progressService->paginateFinishedPupils();

        return view('admin_panel.user_progresses.index',compact('data'));
    }

    public function confirmLessonFinished(UserProgress $userProgress)
    {
        $this->progressService->updateToNextLesson($userProgress,
            $this->lessonService->getLessonsFromCourseWithPriority($userProgress->lesson->course_id));

        return redirect()->route('admin.user_progresses.index');
    }

    public function create()
    {
        $courses = $this->courseService->getAllByAuthor(Auth::id());
        $users = $this->userService->getAll();

        return view('admin_panel.user_progresses.create',compact(['courses','users']));
    }

    public function store(StoreUserProgressRequest $request)
    {
        $this->progressService->create(new CreateUserProgressDTO(...$request->validated()));

        return redirect()->route('admin.user_progresses.index');
    }
}
