<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateLessonDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class LessonController extends Controller
{
    /**
     * @param LessonService $lessonService
     * @param CourseService $courseService
     */
    public function __construct(private readonly LessonService $lessonService, private readonly CourseService $courseService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = $this->lessonService->paginate();

        return view('admin_panel.lessons.index',compact('lessons'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function indexTrashed()
    {
        $lessons = $this->lessonService->paginateTrashed();

        return view('admin_panel.lessons.index_trashed',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $courses = $this->courseService->getAll();

        return view('admin_panel.lessons.create',compact(['courses','course']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request, Course $course)
    {
        $this->lessonService->create(new CreateLessonDTO(...$request->validated()));

        return redirect()->route('admin.courses.show',compact('course'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Course $course)
    {
        $lesson = $this->lessonService->findFirstById($id);

        return view('admin_panel.lessons.show',compact(['lesson','course']));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showTrashed(string $id)
    {
        $lesson = $this->lessonService->findFirstByIdTrashed($id);

        return view('admin_panel.lessons.show_trashed',compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lesson = $this->lessonService->findFirstById($id);
        $courses = $this->courseService->getAll();

        return view('admin_panel.lessons.edit',compact(['lesson','courses']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLessonRequest $request, Course $course, Lesson $lesson)
    {
        $this->lessonService->updateById($lesson->id, new CreateLessonDTO(...$request->validated()));

        return redirect()->route('admin.courses.show',compact('course'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->lessonService->deleteById($id);

        return redirect()->route('admin.lessons.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->lessonService->restoreById($id);

        return redirect()->route('admin.lessons.index');
    }
}
