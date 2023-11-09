<?php

namespace App\DTO\UserTakenExamination;

use Spatie\LaravelData\Data;

class SetStatusUserTakenExaminationDTO extends Data
{
    public function __construct(
        public string $status)
    {
    }
}
