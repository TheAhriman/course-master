<?php

namespace App\Repositories;

use App\Models\UserAnswer;
use App\Repositories\Interfaces\UserAnswerRepositoryInterface;

class UserAnswerRepository extends BaseRepository implements UserAnswerRepositoryInterface
{
    /**
     * @param UserAnswer $userAnswer
     */
    public function __construct(UserAnswer $userAnswer)
    {
        parent::__construct($userAnswer);
    }
}
