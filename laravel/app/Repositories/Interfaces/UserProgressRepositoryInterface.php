<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Resources\Json\JsonResource;

interface UserProgressRepositoryInterface extends BaseRepositoryInterface
{
	/**
	 * @param string $user_id
	 * @param string $course_id
	 * @return JsonResource
	 */
	public function firstByUserIdAndCourseId(string $user_id, string $course_id): JsonResource;

    /**
     * @param string $user_id
     * @param string $examination_id
     * @return JsonResource
     */
    public function firstByUserIdAndExaminationId(string $user_id, string $examination_id): JsonResource;
}
