<?php

namespace App\Repositories;

use App\Models\UserLesson;
use App\Repositories\Interfaces\UserLessonRepositoryInterface;

class UserLessonRepository extends BaseRepository implements UserLessonRepositoryInterface
{
    /**
     * @param UserLesson $userLesson
     */
    public function __construct(UserLesson $userLesson)
    {
        parent::__construct($userLesson);
    }
}
