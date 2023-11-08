<?php

namespace App\Repositories;

use App\Models\UserTakenCourse;
use App\Models\UserTakenExamination;
use App\Repositories\Interfaces\UserTakenCourseRepositoryInterface;
use App\Repositories\Interfaces\UserTakenExaminationRepositoryInterface;

class UserTakenExaminationRepository extends BaseRepository implements UserTakenExaminationRepositoryInterface
{
    /**
     * @param UserTakenExamination $userTakenExamination
     */
    public function __construct(UserTakenExamination $userTakenExamination)
    {
        parent::__construct($userTakenExamination);
    }
}
