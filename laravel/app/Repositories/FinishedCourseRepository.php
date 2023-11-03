<?php

namespace App\Repositories;

use App\Models\FinishedCourse;
use App\Repositories\Interfaces\FinishedCourseRepositoryInterface;

class FinishedCourseRepository extends BaseRepository implements FinishedCourseRepositoryInterface
{
    /**
     * @param FinishedCourse $finishedCourse
     */
    public function __construct(FinishedCourse $finishedCourse)
    {
        parent::__construct($finishedCourse);
    }
}
