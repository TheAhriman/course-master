<?php

namespace App\Http\Services;

use App\DTO\UserTakenExamination\SetStatusUserTakenExaminationDTO;
use App\Models\User;
use App\Models\UserTakenExamination;
use App\Repositories\Interfaces\UserTakenExaminationRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTakenExaminationService extends BaseService
{
    /**
     * @param UserTakenExaminationRepositoryInterface $repository
     */
    public function __construct(UserTakenExaminationRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param string $user_id
     * @param string $examination_id
     * @return JsonResource
     */
    public function findByExaminationIdAndUserId(string $user_id, string $examination_id): JsonResource
    {
        return new JsonResource($this->repository->where(['user_id' => $user_id, 'examination_id' => $examination_id])->first());
    }

    /**
     * @param UserTakenExamination $userTakenExamination
     * @return void
     */
    public function setInProcessStatus(UserTakenExamination $userTakenExamination)
    {
        $this->repository->updateById($userTakenExamination->id, new SetStatusUserTakenExaminationDTO('in_process'));
    }
}
