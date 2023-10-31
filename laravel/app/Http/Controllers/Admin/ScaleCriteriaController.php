<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateScaleCriteriaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScaleCriteriaRequest;
use App\Http\Services\ExaminationService;
use App\Http\Services\ScaleCriteriaService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ScaleCriteriaController extends Controller
{
    /**
     * @param ScaleCriteriaService $criteriaService
     * @param ExaminationService $examinationService
     */
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
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
        $this->criteriaService->create(new CreateScaleCriteriaDTO(...$request->validated()));

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

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
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
        $this->criteriaService->updateById($id, new CreateScaleCriteriaDTO(...$request->validated()));

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

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->criteriaService->restoreById($id);

        return redirect()->route('admin.criterias.index');
    }
}
