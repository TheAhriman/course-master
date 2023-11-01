<?php

namespace App\Policies;

use App\Http\Services\LessonService;
use App\Http\Services\UserProgressService;
use App\Models\Lesson;
use App\Models\User;

class LessonPolicy
{
	/**
	 * @param LessonService $lessonService
	 * @param UserProgressService $progressService
	 */
	public function __construct(
			private readonly LessonService $lessonService,
			private readonly UserProgressService $progressService
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

	/**
	 * @param User $user
	 * @param Lesson $lesson
	 * @return bool
	 */
    public function show(User $user, Lesson $lesson): bool
    {
        if ($user->role->name == 'creator' && $user->id == $lesson->course->user_id) return true;

        return $this->viewLesson($user, $lesson);
    }

	/**
	 * @param User $user
	 * @param Lesson $lesson
	 * @return bool
	 */
	public function viewLesson(User $user, Lesson $lesson): bool
	{
		$userProgress = $this->progressService->firstByUserIdAndCourseId($user->id, $lesson->course_id);;

		if ($userProgress == null || $userProgress->lesson->priority < $lesson->priority) return false;

		return true;
	}

	/**
	 * @param User $user
	 * @param Lesson $lesson
	 * @return bool
	 */
	public function notLastLessonOnCourse(User $user, Lesson $lesson): bool
	{
		return !$this->lessonService->checkLast(
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
		$userProgress = $this->progressService->firstByUserIdAndCourseId($user->id, $lesson->course_id);

		if ($userProgress->lesson->priority > $lesson->priority) return true;

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
		$userProgress = $this->progressService->firstByUserIdAndCourseId($user->id, $lesson->course_id);

		return ($userProgress->lesson->priority == $lesson->priority && $userProgress->finished == 0);
	}
}
