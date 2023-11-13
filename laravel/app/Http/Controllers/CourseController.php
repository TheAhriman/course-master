<?php

namespace App\Http\Controllers;

use App\DTO\UserTakenCourse\CreateUserTakenCourseDTO;
use App\Http\Services\AboutCourseService;
use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use App\Http\Services\UserTakenCourseService;
use App\Models\Course;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * @param CourseService $courseService
     * @param LessonService $lessonService
     * @param AboutCourseService $aboutCourseService
     * @param UserTakenCourseService $takenCourseService
     */
    public function __construct(
        private readonly CourseService $courseService,
        private readonly LessonService $lessonService,
        private readonly AboutCourseService $aboutCourseService,
        private readonly UserTakenCourseService $takenCourseService
    )
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


    public function show(Course $course)
    {
        $course = $this->courseService->findFirstById($course->id);
        $aboutCourse = $this->aboutCourseService->findFirstById($course->about_course_id);
        $content = $this->lessonService->getWithExaminationsByCourseId($course->id);
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($course->id, Auth::id());

        return view('courses.show',compact(['course','content','aboutCourse', 'takenCourse']));
    }

    /**
     * @param Course $course
     * @return RedirectResponse
     */
    public function signUp(Course $course): RedirectResponse
    {
        $this->takenCourseService->create(new CreateUserTakenCourseDTO(
            Auth::id(),
            $course->id,
            $this->lessonService->getLessonsFromCourseWithPriority($course->id)->first()->id,
            'requested')
        );

        return redirect()->route('courses.index');
    }
}
