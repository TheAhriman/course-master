<?php

namespace App\Policies;

use App\Enums\TakingExaminationStatusTypeEnum;
use App\Http\Services\UserTakenExaminationService;
use App\Models\Examination;
use App\Models\User;

class ExaminationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct(private readonly UserTakenExaminationService $takenExaminationService)
    {
    }

    public function takeExamination(User $user, Examination $examination): bool
    {
        if(!$this->takenExaminationService->findByUserIdAndExaminationId($user->id, $examination->id)->resource)
            return false;

        return true;
    }

    public function show(User $user, Examination $examination): bool
    {
        if (!$this->takeExamination($user, $examination))
            return false;

        if ($this->takenExaminationService->findByUserIdAndExaminationId($user->id, $examination->id)->status == TakingExaminationStatusTypeEnum::FINISHED)
            return false;

        return true;
    }
}
