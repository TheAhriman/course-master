<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateQuestionResponseDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionResponseRequest;
use App\Http\Services\QuestionResponseService;
use App\Http\Services\QuestionService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class QuestionResponseController extends Controller
{
    /**
     * @param QuestionResponseService $questionResponseService
     * @param QuestionService $questionService
     */
    public function __construct(private readonly QuestionResponseService $questionResponseService, private readonly QuestionService $questionService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionResponses = $this->questionResponseService->paginate();

        return view('admin_panel.question_responses.index',compact('questionResponses'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function indexTrashed()
    {
        $questionResponses = $this->questionResponseService->paginateTrashed();

        return view('admin_panel.question_responses.index_trashed',compact('questionResponses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions = $this->questionService->getAll();

        return view('admin_panel.question_responses.create',compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionResponseRequest $request)
    {
        $this->questionResponseService->create(new CreateQuestionResponseDTO(...$request->validated()));

        return redirect()->route('admin.question_responses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questionResponse = $this->questionResponseService->findFirstById($id);

        return view('admin_panel.question_responses.show',compact('questionResponse'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showTrashed(string $id)
    {
        $questionResponse = $this->questionResponseService->findFirstByIdTrashed($id);

        return view('admin_panel.question_responses.show_trashed',compact('questionResponse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $questionResponse = $this->questionResponseService->findFirstById($id);
        $questions = $this->questionService->getAll();

        return view('admin_panel.question_responses.edit',compact(['questions','questionResponse']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreQuestionResponseRequest  $request, string $id)
    {
        $this->questionResponseService->updateById($id, new CreateQuestionResponseDTO(...$request->validated()));

        return redirect()->route('admin.question_responses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->questionResponseService->deleteById($id);

        return redirect()->route('admin.question_responses.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->questionResponseService->restoreById($id);

        return redirect()->route('admin.question_responses.index');
    }
}
