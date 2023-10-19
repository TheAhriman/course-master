<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct(private readonly LessonService $lessonService, private readonly CourseService $courseService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = $this->lessonService->getAll(15);

        return view('admin_panel.lessons.index',compact('lessons'));
    }

    public function indexTrashed()
    {
        $lessons = $this->lessonService->getAllTrashed(15);

        return view('admin_panel.lessons.index_trashed',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->courseService->getAll();

        return view('admin_panel.lessons.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $data = $request->validated();
        $this->lessonService->create($data);

        return redirect()->route('admin.lessons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson = $this->lessonService->getById($id);

        return view('admin_panel.lessons.show',compact('lesson'));
    }

    public function showTrashed(string $id)
    {
        $lesson = $this->lessonService->getByIdTrashed($id);

        return view('admin_panel.lessons.show_trashed',compact('lesson'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lesson = $this->lessonService->getById($id);
        $courses = $this->courseService->getAll();

        return view('admin_panel.lessons.edit',compact(['lesson','courses']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLessonRequest $request, string $id)
    {
        $data = $request->validated();
        $this->lessonService->updateById($id, $data);

        return redirect()->route('admin.lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->lessonService->deleteById($id);

        return redirect()->route('admin.lessons.index');
    }

    public function restore(string $id)
    {
        $this->lessonService->restoreById($id);

        return redirect()->route('admin.lessons.index');
    }
}
