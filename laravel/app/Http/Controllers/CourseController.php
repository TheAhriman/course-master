<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\CourseService;
use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct(private readonly CategoryService $categoryService, private readonly CourseService $courseService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $courses = $this->courseService->getAll(15);

        return view('admin_panel.courses.index',compact('courses'));
    }

    public function indexTrashed(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $courses = $this->courseService->getAllTrashed(15);

        return view('admin_panel.courses.index_trashed',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->categoryService->getAll();
        $users = User::all();

        return view('admin_panel.courses.create',compact(['categories','users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();
        $this->courseService->createCourseAndCategories($data);

        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $course = $this->courseService->getById($course->id);

        return view('admin_panel.courses.show',compact('course'));
    }

    public function showTrashed(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $course = $this->courseService->getByIdTrashed($id);

        return view('admin_panel.courses.show_trashed',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        //Пока не придумал как организовать экшен правильно, поэтому пока так:)
        $course = $this->courseService->getById($course->id);
        $categories = $this->categoryService->getAll();
        $users = User::all();

        return view('admin_panel.courses.edit',compact(['course','categories','users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCourseRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $this->courseService->updateCourseAndCategories($data, $id);

        return redirect()->route('admin.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): RedirectResponse
    {
        $this->courseService->deleteById($course->id);

        return redirect()->route('admin.courses.index');
    }

    public function restore(string $id): RedirectResponse
    {
        $this->courseService->restoreById($id);

        return redirect()->route('admin.courses.index');
    }
}
