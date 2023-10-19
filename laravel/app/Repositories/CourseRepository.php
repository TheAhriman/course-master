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

    public function getAll(?int $limit = null): ResourceCollection
    {
        return new CourseCollection(parent::getAll($limit));
    }

    public function getAllTrashed(?int $limit = null): ResourceCollection
    {
        return new CourseCollection(parent::getAllTrashed($limit));
    }

    public function findById(string $value, ?array $option = [],
        ?array $columns = ['*'], ?string $condition = 'id'): CourseResource
    {
        return new CourseResource(parent::findById($value, $option, $columns, $condition));
    }

    public function findOnlyTrashedById(int $id): CourseResource
    {
        return new CourseResource(parent::findOnlyTrashedById($id));
    }

    public function findWithTrashedById(int $id): CourseResource
    {
        return new CourseResource(parent::findWithTrashedById($id));
    }



    public function syncCourseAndCategories(CourseResource $course,array $categoriesIds) : void
    {
        $course->categories()->sync($categoriesIds);
    }

    public function findLastCourse(): CourseResource
    {
        return new CourseResource($this->model->query()->latest('id')->first());
    }
}
