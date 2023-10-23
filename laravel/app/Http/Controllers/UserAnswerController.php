<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAnswerRequest;
use App\Http\Services\UserAnswerService;
use App\Models\Question;
use App\Models\QuestionResponse;
use App\Models\User;

class UserAnswerController extends Controller
{
    public function __construct(private readonly UserAnswerService $userAnswerService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAnswers = $this->userAnswerService->paginate();

        return view('admin_panel.user_answers.index',compact('userAnswers'));
    }

    public function indexTrashed()
    {
        $userAnswers = $this->userAnswerService->paginateTrashed();

        return view('admin_panel.user_answers.index_trashed',compact('userAnswers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions = Question::all();
        $users = User::all();
        $questionResponses = QuestionResponse::all();

        return view('admin_panel.user_answers.create',compact(['questions','questionResponses','users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAnswerRequest $request)
    {
        $data = $request->validated();
        $this->userAnswerService->create($data);

        return redirect()->route('admin.user_answers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userAnswer = $this->userAnswerService->findFirstById($id);

        return view('admin_panel.user_answers.show',compact('userAnswer'));
    }

    public function showTrashed(string $id)
    {
        $userAnswer = $this->userAnswerService->findFirstByIdTrashed($id);

        return view('admin_panel.user_answers.show_trashed',compact('userAnswer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userAnswer = $this->userAnswerService->findFirstById($id);
        $questions = Question::all();
        $users = User::all();
        $questionResponses = QuestionResponse::all();

        return view('admin_panel.user_answers.edit',compact(['userAnswer','questions','questionResponses','users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserAnswerRequest $request, string $id)
    {
        $data = $request->validated();
        $this->userAnswerService->updateById($id, $data);

        return redirect()->route('admin.user_answers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userAnswerService->deleteById($id);

        return redirect()->route('admin.user_answers.index');
    }

    public function restore(string $id)
    {
        $this->userAnswerService->restoreById($id);

        return redirect()->route('admin.user_answers.index');
    }
}
