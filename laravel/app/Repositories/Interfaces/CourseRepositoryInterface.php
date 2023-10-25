<?php

namespace App\Repositories\Interfaces;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

interface CourseRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param JsonResource $course
     * @param array $categoriesIds
     * @return void
     */
    public function syncCourseAndCategories(JsonResource $course, array $categoriesIds) : void;

    /**
     * @return JsonResource
     */
    public function findLastCourse(): JsonResource;
}
