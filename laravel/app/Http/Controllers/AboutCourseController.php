<?php

namespace App\Http\Controllers;

use App\DTO\CreateAboutCourseDTO;
use App\Http\Requests\StoreAboutCourseRequest;
use App\Http\Services\AboutCourseService;
use App\Http\Services\CourseService;
use App\Models\AboutCourse;
use App\Models\Course;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AboutCourseController extends Controller
{
    /**
     * @param AboutCourseService $aboutCourseService
     * @param CourseService $courseService
     */
    public function __construct(private readonly AboutCourseService $aboutCourseService, private readonly CourseService $courseService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutCourses = $this->aboutCourseService->paginate();

        return view('admin_panel.about_courses.index', compact('aboutCourses'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function indexTrashed()
    {
        $aboutCourses = $this->aboutCourseService->paginate();

        return view('admin_panel.about_courses.index_trashed', compact('aboutCourses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $courses = $this->courseService->getAll();

        return view('admin_panel.about_courses.create', compact(['courses','course']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutCourseRequest $request, Course $course)
    {
        $aboutCourse = $this->aboutCourseService->create(new CreateAboutCourseDTO(...$request->validated()));
        $this->courseService->updateById($course->id,['about_course_id' => $aboutCourse->id]);

        return redirect()->route('admin.courses.show', $course->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aboutCourse = $this->aboutCourseService->findFirstById($id);

        return view('admin_panel.about_courses.show', compact('aboutCourse'));
    }

    public function showTrashed(string $id)
    {
        $aboutCourse = $this->aboutCourseService->findFirstByIdTrashed($id);

        return view('admin_panel.about_courses.show_trashed', compact('aboutCourse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, AboutCourse $aboutCourse)
    {
        $aboutCourse = $this->aboutCourseService->findFirstById($aboutCourse->id);

        return view('admin_panel.about_courses.edit', compact(['aboutCourse','course']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAboutCourseRequest $request, Course $course, AboutCourse $aboutCourse)
    {
        $this->aboutCourseService->updateById($aboutCourse->id, new CreateAboutCourseDTO(...$request->validated()));

        return redirect()->route('admin.courses.show', $course->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->aboutCourseService->deleteById($id);

        return redirect()->route('admin.about_courses.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->aboutCourseService->restoreById($id);

        return redirect()->route('admin.about_courses.index');
    }
}
