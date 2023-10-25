<?php

namespace App\Repositories;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use PhpParser\Builder;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    /**
     * @param Course $course
     */
    public function __construct(Course $course)
    {
        parent::__construct($course);
    }

    /**
     * @param JsonResource $course
     * @param array $categoriesIds
     * @return void
     */
    public function syncCourseAndCategories(JsonResource $course,array $categoriesIds) : void
    {
        $course->categories()->sync($categoriesIds);
    }

    /**
     * @return JsonResource
     */
    public function findLastCourse(): JsonResource
    {
        return new JsonResource($this->model->newQuery()->latest()->first());
    }

}
