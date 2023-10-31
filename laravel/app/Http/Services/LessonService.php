<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\LessonRepositoryInterface;
use Illuminate\Support\Collection;

class LessonService extends BaseService
{
    /**
     * @param LessonRepositoryInterface $repository
     */
    public function __construct(LessonRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param string $id
     * @return Collection
     */
    public function getLessonsFromCourseWithPriority(string $id): Collection
    {
        return $this->repository->where(['course_id' => $id],'priority','asc');
    }

}
