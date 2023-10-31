<?php

namespace App\Http\Controllers;

use App\DTO\CreateUserProgressDTO;
use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use App\Http\Services\UserProgressService;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct(private readonly CourseService $courseService)
    {
    }

    public function index()
    {
        $data = $this->courseService->getAllWithAuthorCategoriesAndLessons();

        return view('courses.index',compact('data'));
    }
}
