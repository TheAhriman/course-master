<?php

namespace App\Http\Controllers;

use App\Enums\ExaminationTypeEnum;
use App\Http\Requests\StoreExaminationRequest;
use App\Http\Services\ExaminationService;
use App\Http\Services\LessonService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    /**
     * @param ExaminationService $examinationService
     * @param LessonService $lessonService
     */
    public function __construct(private readonly ExaminationService $examinationService,
        private readonly LessonService $lessonService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examinations = $this->examinationService->paginate();

        return view('admin_panel.examinations.index',compact('examinations'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function indexTrashed()
    {
        $examinations = $this->examinationService->paginateTrashed(15);

        return view('admin_panel.examinations.index_trashed',compact('examinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lessons = $this->lessonService->getAll();

        return view('admin_panel.examinations.create',compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExaminationRequest $request)
    {
        $data = $request->validated();
        $this->examinationService->create($data);

        return redirect()->route('admin.examinations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $examination = $this->examinationService->findFirstById($id);

        return view('admin_panel.examinations.show',compact('examination'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showTrashed(string $id)
    {
        $examination = $this->examinationService->findFirstByIdTrashed($id);

        return view('admin_panel.examinations.show_trashed',compact('examination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lessons = $this->lessonService->getAll();
        $examination = $this->examinationService->findFirstById($id);

        return view('admin_panel.examinations.edit',compact(['lessons','examination']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExaminationRequest $request, string $id)
    {
        $data = $request->validated();
        $this->examinationService->updateById($id, $data);

        return redirect()->route('admin.examinations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->examinationService->deleteById($id);

        return redirect()->route('admin.examinations.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->examinationService->restoreById($id);

        return redirect()->route('admin.examinations.index');
    }
}
