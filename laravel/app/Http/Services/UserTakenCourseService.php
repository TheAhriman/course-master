<?php

namespace App\Http\Services;

use App\DTO\UpdateUserProgressDTO;
use App\DTO\UserTakenCourse\SetStatusUserTakenCourseDTO;
use App\DTO\UserTakenCourse\UpdateLessonUserTakenCourseDTO;
use App\Models\UserTakenCourse;
use App\Repositories\Interfaces\ScaleCriteriaRepositoryInterface;
use App\Repositories\Interfaces\UserTakenCourseRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use function Laravel\Prompts\warning;

class UserTakenCourseService extends BaseService
{
    /**
     * @param UserTakenCourseRepositoryInterface $repository
     */
    public function __construct(UserTakenCourseRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param UserTakenCourse $takenCourse
     * @param Collection $lessons
     * @return void
     */
    public function updateToNext(UserTakenCourse $takenCourse, Collection $lessons): void
    {
        $lessons = $lessons->getIterator();

        while($lessons->current()->id !== $takenCourse->lesson_id)
            $lessons->next();

        if($lessons->current() == end($lessons))
            $this->setCourseFinished($takenCourse);

        $lessons->next();
        parent::updateById($takenCourse->id, new UpdateLessonUserTakenCourseDTO($lessons->current()->id));
    }

    /**
     * @param UserTakenCourse $takenCourse
     * @return void
     */
    public function setCourseFinished(UserTakenCourse $takenCourse): void
    {
        parent::updateById($takenCourse->id, new SetStatusUserTakenCourseDTO('finished'));
    }

    public function setTestingStatus(UserTakenCourse $takenCourse): void
    {
        parent::updateById($takenCourse->id, new SetStatusUserTakenCourseDTO('testing'));
    }

    /**
     * @param string $course_id
     * @param string $user_id
     * @return JsonResource
     */
    public function findByCourseIdAndUserId(string $course_id, string $user_id): JsonResource
    {
        return new JsonResource($this->repository->where(['course_id' => $course_id, 'user_id' => $user_id])->first());
    }

    /**
     * @param UserTakenCourse $takenCourse
     * @return void
     */
    public function setLessonFinished(UserTakenCourse $takenCourse): void
    {
        parent::updateById($takenCourse->id, new SetStatusUserTakenCourseDTO('waiting'));
    }

    /**
     * @param string $course_id
     * @return Collection
     */
    public function findWaiting(string $course_id): Collection
    {
        return $this->repository->where(['course_id' => $course_id, 'status' => 'waiting']);
    }

    public function waiting(Collection $courses)
    {
        return $this->repository->whereIn(['course_id',$courses->keyBy('id')->keys()])->where(['status' => 'waiting']);
    }

}
