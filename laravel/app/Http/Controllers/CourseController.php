<?php

namespace App\Http\Controllers;

use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class CourseController extends Controller
{
	/**
	 * @param CourseService $courseService
	 */
    public function __construct(private readonly CourseService $courseService, private readonly LessonService $lessonService)
    {
    }

	/**
	 * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
	 */
    public function index(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $data = $this->lessonService->countExaminationsAndPaginate($this->courseService->getAllWithAuthorCategoriesAndLessons());

        return view('courses.index',compact('data'));
    }

    public function show()
    {
        return view('courses.show');
    }
}
