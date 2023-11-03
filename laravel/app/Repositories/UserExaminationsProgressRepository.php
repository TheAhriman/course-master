<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserExaminationsProgressRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\LaravelData\Data;

class UserExaminationsProgressRepository extends BaseRepository implements UserExaminationsProgressRepositoryInterface
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * @param string $user_id
     * @param string $examination_id
     * @return JsonResource
     */
    public function firstByUserIdAndExaminationId(string $user_id, string $examination_id): JsonResource
    {
        return new JsonResource($this->where(['user_id' => $user_id, 'examination_id' => $examination_id])->first());
    }
}
