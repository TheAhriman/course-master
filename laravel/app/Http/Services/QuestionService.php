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
     * @param int|null $number
     * @return Collection
     */
    public function getQuestionsWithResponsesByQuestionGroupId(QuestionGroup $questionGroup, ?int $number = null): Collection
    {
        $questions = $this->repository->with('question_response')->where(['question_group_id' => $questionGroup->id]);
        if ($number) $questions = $questions->random($number);
        return $questions;
    }

    /**
     * @param Collection $questions
     * @return string
     */
    public function turnQuestionsToSlug(Collection $questions): string
    {
         $slug = "";
         foreach ($questions as $question)
         {
             $slug.="questions[]=".$question->id;
             if($question->id != $questions->last()->id)
                 $slug.="&";
         }

         return $slug;
    }

    /**
     * @param Collection $questions_ids
     * @return Collection
     */
    public function getQuestionsWithResponsesByIds(Collection $questions_ids): Collection
    {
        return $this->repository->whereIn(['id', $questions_ids->toArray()['questions']])->with('question_response')->get();
    }
}
