<?php

namespace App\Repositories;

use App\Models\AboutCourse;
use App\Repositories\Interfaces\AboutCourseRepositoryInterface;

class AboutCourseRepository extends BaseRepository implements AboutCourseRepositoryInterface
{
    /**
     * @param AboutCourse $aboutCourse
     */
    public function __construct(AboutCourse $aboutCourse)
    {
        parent::__construct($aboutCourse);
    }
}
