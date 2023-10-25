<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\StoreQuestionResponseRequest;
use App\Http\Services\QuestionResponseService;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionResponseController extends Controller
{
    public function __construct(private readonly QuestionResponseService $questionResponseService)
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
        $questions = Question::all();

        return view('admin_panel.question_responses.create',compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionResponseRequest $request)
    {
        $data = $request->validated();
        $this->questionResponseService->create($data);

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
        $questions = Question::all();

        return view('admin_panel.question_responses.edit',compact(['questions','questionResponse']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreQuestionResponseRequest  $request, string $id)
    {
        $data = $request->validated();
        $this->questionResponseService->updateById($id, $data);

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

    public function restore(string $id)
    {
        $this->questionResponseService->restoreById($id);

        return redirect()->route('admin.question_responses.index');
    }
}
