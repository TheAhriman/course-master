<?php

namespace App\Policies;

use App\Http\Services\LessonService;
use App\Http\Services\UserProgressService;
use App\Http\Services\UserTakenCourseService;
use App\Models\Lesson;
use App\Models\User;

class LessonPolicy
{
    /**
     * @param LessonService $lessonService
     * @param UserTakenCourseService $takenCourseService
     */
	public function __construct(
        private readonly LessonService $lessonService,
        private readonly UserTakenCourseService $takenCourseService
	)
	{
	}

	/**
	 * @param User $user
	 * @return bool|null
	 */
	public function before(User $user): bool|null
	{
		if ($user->role->name == 'admin')
			return true;
		return null;
	}

    public function notFinishedCourse(User $user, Lesson $lesson): bool
    {
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($lesson->course_id, $user->id);

        if ($takenCourse->resource == null)
            return false;

        if ($takenCourse->status == 'finished')
            return false;
        return true;
    }

	/**
	 * @param User $user
	 * @param Lesson $lesson
	 * @return bool
	 */
    public function show(User $user, Lesson $lesson): bool
    {
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($lesson->course_id,$user->id);
        if($takenCourse->resource == null || $takenCourse->status == 'requested')
            return false;

        if(!$this->notFinishedCourse($user,$lesson))
            return false;

        return $this->viewLesson($user, $lesson);
    }

	/**
	 * @param User $user
	 * @param Lesson $lesson
	 * @return bool
	 */
	public function viewLesson(User $user, Lesson $lesson): bool
	{
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($lesson->course_id, $user->id);

		if ($takenCourse->resource == null || $takenCourse->lesson->priority < $lesson->priority) return false;

		return true;
	}

	/**
	 * @param User $user
	 * @param Lesson $lesson
	 * @return bool
	 */
	public function notLastLesson(User $user, Lesson $lesson): bool
	{
		return !$this->lessonService->checkLast(
				lessons: $this->lessonService->getLessonsFromCourseWithPriority($lesson->course_id),
				lesson:  $lesson
		);
	}

    public function lastLesson(User $user, Lesson $lesson): bool
    {
        return $this->lessonService->checkLast(
            lessons: $this->lessonService->getLessonsFromCourseWithPriority($lesson->course_id),
            lesson:  $lesson
        );
    }

	/**
	 * @param User $user
	 * @param Lesson $lesson
	 * @return bool
	 */
	public function viewNextLesson(User $user, Lesson $lesson): bool
	{
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($lesson->course_id, $user->id);

		if ($takenCourse->resource != null && $takenCourse->lesson->priority > $lesson->priority) return true;

		return false;
	}

	/**
	 * @param User $user
	 * @param Lesson $lesson
	 * @return bool
	 */
	public function firstLesson(User $user, Lesson $lesson): bool
	{
		return $lesson->priority == 1;
	}

    /**
     * @param User $user
     * @param Lesson $lesson
     * @return bool
     */
	public function confirm(User $user, Lesson $lesson): bool
	{
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($lesson->course_id, $user->id);
        if (!$takenCourse->resource)
            return false;
		return ($takenCourse->lesson->priority == $lesson->priority && $takenCourse->status != 'waiting');
	}
}
