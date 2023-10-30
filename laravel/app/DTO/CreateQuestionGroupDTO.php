<?php

namespace App\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class CreateQuestionGroupDTO extends Data
{
    public function __construct(
        public string $title,
        public int $priority,
        public int $examination_id,
    )
    {
    }
}
