<?php

namespace App\Repositories;

use App\Models\UserProgress;
use App\Repositories\Interfaces\UserProgressRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProgressRepository extends BaseRepository implements UserProgressRepositoryInterface
{
    /**
     * @param UserProgress $userProgress
     */
    public function __construct(UserProgress $userProgress)
    {
        parent::__construct($userProgress);
    }

	/**
	 * @param string $user_id
	 * @param string $course_id
	 * @return JsonResource
	 */
	public function firstByUserIdAndCourseId(string $user_id, string $course_id): JsonResource
	{
		return new JsonResource($this->where(['user_id' => $user_id, 'course_id' => $course_id])->first());
	}
}
