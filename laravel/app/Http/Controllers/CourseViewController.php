<?php

namespace App\Http\Controllers;

use App\Http\Services\AboutCourseService;
use Illuminate\Http\Request;

class CourseViewController extends Controller
{
    public function __construct(private readonly AboutCourseService $aboutCourseService)
    {
    }
    public function show()
    {
        $aboutCourse = $this->aboutCourseService->findFirstById(1);

        return view('course.about',compact('aboutCourse'));
    }
}
