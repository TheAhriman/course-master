<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonContentRequest;
use App\Http\Services\LessonContentService;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonContentController extends Controller
{
    public function __construct(private readonly LessonContentService $lessonContentService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessonContents = $this->lessonContentService->paginate();

        return view('admin_panel.lesson_contents.index',compact('lessonContents'));
    }

    public function indexTrashed()
    {
        $lessonContents = $this->lessonContentService->paginateTrashed();

        return view('admin_panel.lesson_contents.index_trashed',compact('lessonContents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lessons = Lesson::all();

        return view('admin_panel.lesson_contents.create',compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonContentRequest $request)
    {
        $data = $request->validated();
        $this->lessonContentService->create($data);

        return redirect()->route('admin.lesson_contents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lessonContent = $this->lessonContentService->findFirstById($id);

        return view('admin_panel.lesson_contents.show',compact('lessonContent'));
    }

    public function showTrashed(string $id)
    {
        $lessonContent = $this->lessonContentService->findFirstByIdTrashed($id);

        return view('admin_panel.lesson_contents.show_trashed',compact('lessonContent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lessonContent = $this->lessonContentService->findFirstById($id);
        $lessons = Lesson::all();

        return view('admin_panel.lesson_contents.edit',compact(['lessons','lessonContent']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLessonContentRequest $request, string $id)
    {
        $data = $request->validated();
        $this->lessonContentService->updateById($id, $data);

        return redirect()->route('admin.lesson_contents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->lessonContentService->deleteById($id);

        return redirect()->route('admin.lesson_contents.index');
    }

    public function restore(string $id)
    {
        $this->lessonContentService->restoreById($id);

        return redirect()->route('admin.lesson_contents.index');
    }
}
