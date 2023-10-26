<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\CourseService;
use App\Http\Services\UserService;
use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * @param CategoryService $categoryService
     * @param CourseService $courseService
     * @param UserService $userService
     */
    public function __construct(private readonly CategoryService $categoryService,
        private readonly CourseService $courseService,
        private readonly UserService $userService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        Auth::user()->hasRole('admin')
            ? $courses = $this->courseService->paginate()
            : $courses = $this->courseService->paginateCreatorCourses(Auth::id());

        return view('admin_panel.courses.index',compact('courses'));
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function indexTrashed(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        Auth::user()->hasRole('admin')
            ? $courses = $this->courseService->paginateTrashed()
            : $courses = $this->courseService->paginateCreatorCoursesTrashed(Auth::id());

        return view('admin_panel.courses.index_trashed',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->categoryService->getAll();
        $users = $this->userService->getAll();

        return view('admin_panel.courses.create',compact(['categories','users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->courseService->createCourseAndCategories($data);

        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): \Illuminate\Contracts\Foundation\Application|Factory|View|Application|\Illuminate\Http\JsonResponse
    {
        $course = $this->courseService->findFirstById($course->id);
            if (Auth::id() != $course->user_id && !Auth::user()->hasRole('admin')) {
                abort(403,'Author does not match with course');
            }
        return view('admin_panel.courses.show',compact('course'));
    }

    /**
     * @param string $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function showTrashed(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $course = $this->courseService->findFirstByIdTrashed($id);
        if ((Auth::id() != $course->user_id) && !Auth::user()->hasRole('admin')) {
            abort(403,'Author does not match with course');
        }

        return view('admin_panel.courses.show_trashed',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $course = $this->courseService->findFirstById($course->id);
        if (Auth::id() != $course->user_id && !Auth::user()->hasRole('admin')) {
            abort(403,'Author does not match with course');
        }
        $categories = $this->categoryService->getAll();
        $users = $this->userService->getAll();

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

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id): RedirectResponse
    {
        $this->courseService->restoreById($id);

        return redirect()->route('admin.courses.index');
    }
}
