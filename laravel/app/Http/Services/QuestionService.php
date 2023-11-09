<?php

namespace App\Http\Services;

use App\Models\QuestionGroup;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use Illuminate\Support\Collection;

class QuestionService extends BaseService
{
    /**
     * @param QuestionRepositoryInterface $repository
     */
    public function __construct(QuestionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param QuestionGroup $questionGroup
     * @return Collection
     */
    public function getQuestionsWithResponsesByQuestionGroupId(QuestionGroup $questionGroup): Collection
    {
        return $this->repository->with('question_response')->where(['question_group_id' => $questionGroup->id]);
    }
}
