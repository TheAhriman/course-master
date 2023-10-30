<?php

namespace App\Repositories;

use App\Models\UserAnswer;
use App\Models\UserProgress;
use App\Repositories\Interfaces\UserProgressRepositoryInterface;

class UserProgressRepository extends BaseRepository implements UserProgressRepositoryInterface
{
    /**
     * @param UserProgress $userProgress
     */
    public function __construct(UserProgress $userProgress)
    {
        parent::__construct($userProgress);
    }
}
