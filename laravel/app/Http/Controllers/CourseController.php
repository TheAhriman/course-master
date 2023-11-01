<?php

namespace App\Http\Controllers;

use App\DTO\CreateUserProgressDTO;
use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use App\Http\Services\UserProgressService;
use App\Models\Lesson;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
	/**
	 * @param CourseService $courseService
	 */
    public function __construct(private readonly CourseService $courseService)
    {
    }

	/**
	 * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
	 */
    public function index(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $data = $this->courseService->getAllWithAuthorCategoriesAndLessons();

        return view('courses.index',compact('data'));
    }
}
