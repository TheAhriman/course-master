<?php

namespace App\Policies;

use App\Http\Services\UserProgressService;
use App\Models\Examination;
use App\Models\User;

class ExaminationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct(private readonly UserProgressService $progressService)
    {
    }

    public function takeExamination(User $user, Examination $examination): bool
    {
        $userProgress = $this->progressService->firstByUserIdAndExaminationId($user->id, $examination->id);

        if ($userProgress->resource == null)
            return false;

        return true;
    }
}
