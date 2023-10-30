<?php

namespace App\Http\Controllers;

use App\DTO\CreateQuestionDTO;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Services\QuestionGroupService;
use App\Http\Services\QuestionService;
use App\Models\QuestionGroup;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * @param QuestionService $questionService
     * @param QuestionGroupService $questionGroupService
     */
    public function __construct(private readonly QuestionService $questionService, private readonly QuestionGroupService $questionGroupService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = $this->questionService->paginate();

        return view('admin_panel.questions.index',compact('questions'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function indexTrashed()
    {
        $questions = $this->questionService->paginateTrashed();

        return view('admin_panel.questions.index_trashed',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questionGroups = $this->questionGroupService->getAll();

        return view('admin_panel.questions.create',compact('questionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $this->questionService->create(new CreateQuestionDTO(...$request->validated()));

        return redirect()->route('admin.questions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = $this->questionService->findFirstById($id);

        return view('admin_panel.questions.show',compact('question'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showTrashed(string $id)
    {
        $question = $this->questionService->findFirstByIdTrashed($id);

        return view('admin_panel.questions.show_trashed',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = $this->questionService->findFirstById($id);
        $questionGroups = $this->questionGroupService->getAll();

        return view('admin_panel.questions.edit',compact(['questionGroups','question']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreQuestionRequest $request, string $id)
    {
        $this->questionService->updateById($id, new CreateQuestionDTO(...$request->validated()));

        return redirect()->route('admin.questions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->questionService->deleteById($id);

        return redirect()->route('admin.questions.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->questionService->restoreById($id);

        return redirect()->route('admin.questions.index');
    }
}
