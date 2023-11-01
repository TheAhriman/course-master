<?php

namespace App\Http\Controllers;

use App\Http\Services\CourseService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

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
        $data = $this->courseService->paginateAllWithAuthorCategoriesAndLessons();

        return view('courses.index',compact('data'));
    }
}
