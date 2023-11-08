<?php

namespace App\Repositories;

use App\Models\UserTakenCourse;
use App\Repositories\Interfaces\UserTakenCourseRepositoryInterface;

class UserTakenCourseRepository extends BaseRepository implements UserTakenCourseRepositoryInterface
{
    /**
     * @param UserTakenCourse $userTakenCourse
     */
    public function __construct(UserTakenCourse $userTakenCourse)
    {
        parent::__construct($userTakenCourse);
    }
}
