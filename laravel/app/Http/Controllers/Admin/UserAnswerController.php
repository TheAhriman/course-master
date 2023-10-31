<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateUserAnswerDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAnswerRequest;
use App\Http\Services\QuestionResponseService;
use App\Http\Services\QuestionService;
use App\Http\Services\UserAnswerService;
use App\Http\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserAnswerController extends Controller
{
    /**
     * @param UserAnswerService $userAnswerService
     * @param QuestionService $questionService
     * @param UserService $userService
     * @param QuestionResponseService $questionResponseService
     */
    public function __construct(private readonly UserAnswerService $userAnswerService,
        private readonly QuestionService $questionService,
        private readonly UserService $userService,
        private readonly QuestionResponseService $questionResponseService)
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

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
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
        $questions = $this->questionService->getAll();
        $users = $this->userService->getAll();
        $questionResponses = $this->questionResponseService->getAll();

        return view('admin_panel.user_answers.create',compact(['questions','questionResponses','users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAnswerRequest $request)
    {
        $this->userAnswerService->create(new CreateUserAnswerDTO(...$request->validated()));

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

    /**
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
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
        $questions = $this->questionService->getAll();
        $users = $this->userService->getAll();
        $questionResponses = $this->questionResponseService->getAll();

        return view('admin_panel.user_answers.edit',compact(['userAnswer','questions','questionResponses','users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserAnswerRequest $request, string $id)
    {
        $this->userAnswerService->updateById($id, new CreateUserAnswerDTO(...$request->validated()));

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

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->userAnswerService->restoreById($id);

        return redirect()->route('admin.user_answers.index');
    }
}
