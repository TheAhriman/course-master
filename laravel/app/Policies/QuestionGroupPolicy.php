<?php

namespace App\Policies;

use App\Enums\TakingExaminationStatusTypeEnum;
use App\Http\Services\UserTakenExaminationService;
use App\Models\QuestionGroup;
use App\Models\User;

class QuestionGroupPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct(private readonly UserTakenExaminationService $takenExaminationService)
    {
    }

    public function show(User $user, QuestionGroup $questionGroup)
    {
        $takenExamination = $this->takenExaminationService->findByUserIdAndExaminationId($user->id, $questionGroup->examination->id);

        if ($takenExamination->resource && $takenExamination->status == TakingExaminationStatusTypeEnum::IN_PROCESS)
            return true;
        return false;
    }
}
