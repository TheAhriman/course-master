<?php

namespace App\Http\Controllers;

use App\DTO\CreateCourseDTO;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\CourseService;
use App\Http\Services\UserService;
use App\Models\Course;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
        Auth::user()->can('viewAny', Course::class)
            ? $courses = $this->courseService->paginate()
            : $courses = $this->courseService->paginateCreatorCourses(Auth::id());

        return view('admin_panel.courses.index',compact('courses'));
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function indexTrashed(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        Auth::user()->can('viewAny', Course::class)
            ? $courses = $this->courseService->paginateTrashed()
            : $courses = $this->courseService->paginateCreatorCoursesTrashed(Auth::id());

        return view('admin_panel.courses.index_trashed',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('create',Course::class);

        $categories = $this->categoryService->getAll();
        $users = $this->userService->getAll();

        return view('admin_panel.courses.create',compact(['categories','users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $this->courseService->createCourseAndCategories(new CreateCourseDTO(...$request->validated()));

        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): \Illuminate\Contracts\Foundation\Application|Factory|View|Application|JsonResponse
    {
        $this->authorize('isAuthor', $course);

        return view('admin_panel.courses.show',compact('course'));
    }

    /**
     * @param string $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function showTrashed(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('isAuthor',$id);

        $course = $this->courseService->findFirstByIdTrashed($id);

        return view('admin_panel.courses.show_trashed',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('isAuthor', $course);

        $course = $this->courseService->findFirstById($course->id);
        $categories = $this->categoryService->getAll();
        $users = $this->userService->getAll();

        return view('admin_panel.courses.edit',compact(['course','categories','users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCourseRequest $request, Course $course): RedirectResponse
    {
        $this->authorize('isAuthor', $course);

        $this->courseService->updateCourseAndCategories(new CreateCourseDTO(...$request->validated()), $course->id);

        return redirect()->route('admin.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): RedirectResponse
    {
        $this->authorize('isAuthor', $course);

        $this->courseService->deleteById($course->id);

        return redirect()->route('admin.courses.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id): RedirectResponse
    {
        $this->authorize('isAuthor',$id);
        $this->courseService->restoreById($id);

        return redirect()->route('admin.courses.index');
    }
}
