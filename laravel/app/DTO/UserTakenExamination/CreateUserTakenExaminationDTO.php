<?php

namespace App\DTO\UserTakenExamination;

use Spatie\LaravelData\Data;

class CreateUserTakenExaminationDTO extends Data
{
    public function __construct(
        public int $user_id,
        public int $examination_id,
        public int $question_group_id,
        public string $status = 'logged'
    )
    {
    }
}
