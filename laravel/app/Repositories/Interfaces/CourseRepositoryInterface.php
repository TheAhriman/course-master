<?php

namespace App\Repositories\Interfaces;

use App\Http\Resources\CourseResource;

interface CourseRepositoryInterface extends BaseRepositoryInterface
{

    public function syncCourseAndCategories(CourseResource $course, array $categoriesIds) : void;

    public function findLastCourse(): CourseResource;

}
