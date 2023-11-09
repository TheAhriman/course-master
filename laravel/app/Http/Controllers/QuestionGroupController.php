<?php

namespace App\Http\Controllers;

use App\Http\Services\QuestionGroupService;
use App\Http\Services\QuestionService;
use App\Models\QuestionGroup;
use Illuminate\Http\Request;

class QuestionGroupController extends Controller
{
    public function __construct(
        private readonly QuestionGroupService $questionGroupService,
        private readonly QuestionService $questionService
    )
    {
    }

    public function show(QuestionGroup $questionGroup)
    {
        $questionGroup = $this->questionGroupService->findFirstById($questionGroup->id);
        $questions = $this->questionService->getQuestionsWithResponsesByQuestionGroupId($questionGroup->resource);

        return view('question_groups.show',compact(['questionGroup','questions']));
    }
}
