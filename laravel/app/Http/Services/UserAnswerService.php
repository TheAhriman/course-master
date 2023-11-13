<?php

namespace App\Http\Services;

use App\DTO\CreateUserAnswerDTO;
use App\Models\Examination;
use App\Repositories\Interfaces\UserAnswerRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserAnswerService extends BaseService
{
    /**
     * @param UserAnswerRepositoryInterface $repository
     */
    public function __construct(UserAnswerRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return void
     */
    public function storeUserAnswers(array $data): void
    {
        foreach($data['questions'] as $answer){
            $this->create(new CreateUserAnswerDTO(Auth::id(),array_search($answer,$data['questions']),$answer));
        }
    }

    /**
     * @param Examination $examination
     * @return bool
     */
    public function checkUserPassedTest(Examination $examination): bool
    {
        $score = 0;
        foreach ($examination->question_groups as $question_group){
            foreach ($question_group->questions as $question){
                $answers = $this->findByUserIdAndQuestionId(Auth::id(), $question->id);
                foreach ($answers as $answer){
                    if($answer->question_response->correct == 0){
                        $score -= $question->score;
                        break;
                    }
                }
                $score += $question->score;
            }
        }
        if ($examination->min_score <= $score)
            return true;
        return false;
    }

    /**
     * @param string $user_id
     * @param string $question_id
     * @return Collection
     */
    public function findByUserIdAndQuestionId(string $user_id, string $question_id): Collection
    {
        return $this->repository->where(['user_id' => $user_id, 'question_id' => $question_id]);
    }

    /**
     * @param Examination $examination
     * @param string $user_id
     * @return void
     */
    public function deleteWrongExaminationAnswers(Examination $examination, string $user_id): void
    {
        foreach ($this->findByExaminationAndUserId($examination, $user_id) as $answer) {
            $this->deleteById($answer->id);
        }
    }

    /**
     * @param Examination $examination
     * @param string $user_id
     * @return Collection
     */
    public function findByExaminationAndUserId(Examination $examination, string $user_id): Collection
    {
        $collection = collect();
        foreach ($examination->question_groups as $question_group) {
            $collection->push($question_group->questions->keyBy('id')->keys());

        }
        return $this->repository->whereIn(['question_id',call_user_func_array('array_merge',$collection->toArray())])->where(['user_id' => $user_id]);
    }
}
