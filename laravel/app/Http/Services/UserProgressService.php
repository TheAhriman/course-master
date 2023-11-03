<?php

namespace App\Http\Services;

use App\DTO\UpdateUserProgressDTO;
use App\Models\Course;
use App\Models\User;
use App\Models\UserProgress;
use App\Repositories\Interfaces\UserProgressRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserProgressService extends BaseService
{
    /**
     * @param UserProgressRepositoryInterface $repository
     */
    public function __construct(UserProgressRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function paginateFinishedPupils(): LengthAwarePaginator
    {
        return $this->repository->where(['finished' => true, 'author_id' => Auth::id()])->paginate();
    }

	/**
	 * @param UserProgress $userProgress
	 * @param Collection $lessons
	 * @return void
	 */
    public function updateToNextLesson(UserProgress $userProgress, Collection $lessons): void
    {
        $lessons = $lessons->getIterator();

        while($lessons->current()->id !== $userProgress->lesson_id)
            $lessons->next();

        $lessons->next();
        parent::updateById($userProgress->id, new UpdateUserProgressDTO($lessons->current()->id, false));
    }

	/**
	 * @param User $user
	 * @return bool
	 */
    public function checkFinishedLessons(User $user): bool
    {
        return $this->repository->where(['author_id' => $user->id, 'finished' => true])->count();
    }

	/**
	 * @param string $user_id
	 * @param string $course_id
	 * @return JsonResource
	 */
	public function firstByUserIdAndCourseId(string $user_id, string $course_id): JsonResource
	{
		return $this->repository->firstByUserIdAndCourseId($user_id, $course_id);
	}

    public function firstByUserIdAndExaminationId(string $user_id, string $examination_id): JsonResource
    {
        return $this->repository->firstByUserIdAndExaminationId($user_id, $examination_id);
    }
}
