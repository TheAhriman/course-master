<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionGroupRequest;
use App\Http\Services\ExaminationService;
use App\Http\Services\QuestionGroupService;
use App\Models\Examination;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionGroupController extends Controller
{
    /**
     * @param QuestionGroupService $groupService
     * @param ExaminationService $examinationService
     */
    public function __construct(private readonly QuestionGroupService $groupService, private readonly ExaminationService $examinationService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionGroups = $this->groupService->paginate();

        return view('admin_panel.question_groups.index',compact('questionGroups'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function indexTrashed()
    {
        $questionGroups = $this->groupService->paginateTrashed();

        return view('admin_panel.question_groups.index_trashed',compact('questionGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $examinations = $this->examinationService->getAll();

        return view('admin_panel.question_groups.create',compact('examinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionGroupRequest $request)
    {
        $data = $request->validated();
        $this->groupService->create($data);

        return redirect()->route('admin.question_groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questionGroup = $this->groupService->findFirstById($id);

        return view('admin_panel.question_groups.show',compact('questionGroup'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showTrashed(string $id)
    {
        $questionGroup = $this->groupService->findFirstByIdTrashed($id);

        return view('admin_panel.question_groups.show_trashed',compact('questionGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $examinations = $this->examinationService->getAll();
        $questionGroup = $this->groupService->findFirstById($id);

        return view('admin_panel.question_groups.edit',compact(['examinations','questionGroup']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreQuestionGroupRequest $request, string $id)
    {
        $data = $request->validated();
        $this->groupService->updateById($id, $data);

        return redirect()->route('admin.question_groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->groupService->deleteById($id);

        return redirect()->route('admin.question_groups.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->groupService->restoreById($id);

        return redirect()->route('admin.question_groups.index');
    }
}
