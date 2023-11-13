<?php

namespace App\Http\Controllers;

use App\Http\Services\QuestionGroupService;
use App\Http\Services\QuestionService;
use App\Http\Services\UserTakenExaminationService;
use App\Models\QuestionGroup;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionGroupController extends Controller
{
    public function __construct(
        private readonly QuestionGroupService $questionGroupService,
        private readonly QuestionService $questionService,
        private readonly UserTakenExaminationService $takenExaminationService
    )
    {
    }

    /**
     * @param QuestionGroup $questionGroup
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function show(QuestionGroup $questionGroup): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $questionGroup = $this->questionGroupService->findFirstById($questionGroup->id);

        $questions = $this->questionService->getQuestionsWithResponsesByIds(
            questions_ids: $this->takenExaminationService->turnSlugToQuestionIds(
                userTakenExamination: $this->takenExaminationService->findByUserIdAndExaminationId(
                    Auth::id(), $questionGroup->examination_id)->resource));


        return view('question_groups.show',compact(['questionGroup','questions']));
    }
}
