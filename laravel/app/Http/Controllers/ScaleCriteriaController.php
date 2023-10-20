<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScaleCriteriaRequest;
use App\Http\Services\ExaminationService;
use App\Http\Services\LessonService;
use App\Http\Services\ScaleCriteriaService;
use Illuminate\Http\Request;

class ScaleCriteriaController extends Controller
{
    public function __construct(private readonly ScaleCriteriaService $criteriaService,
        private readonly ExaminationService $examinationService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterias = $this->criteriaService->paginate();

        return view('admin_panel.criterias.index',compact('criterias'));
    }

    public function indexTrashed()
    {
        $criterias = $this->criteriaService->paginateTrashed();

        return view('admin_panel.criterias.index_trashed',compact('criterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $examinations = $this->examinationService->getAll();


        return view('admin_panel.criterias.create',compact('examinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScaleCriteriaRequest $request)
    {
        $data = $request->validated();
        $this->criteriaService->create($data);

        return redirect()->route('admin.criterias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $criteria = $this->criteriaService->findFirstById($id);

        return view('admin_panel.criterias.show', compact('criteria'));
    }

    public function showTrashed(string $id)
    {
        $criteria = $this->criteriaService->findFirstByIdTrashed($id);

        return view('admin_panel.criterias.show_trashed',compact('criteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $criteria = $this->criteriaService->findFirstById($id);
        $examinations = $this->examinationService->getAll();

        return view('admin_panel.criterias.edit',compact(['criteria','examinations']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreScaleCriteriaRequest $request, string $id)
    {
        $data = $request->validated();
        $this->criteriaService->updateById($id, $data);

        return redirect()->route('admin.criterias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->criteriaService->deleteById($id);

        return redirect()->route('admin.criterias.index');
    }

    public function restore(string $id)
    {
        $this->criteriaService->restoreById($id);

        return redirect()->route('admin.criterias.index');
    }
}
