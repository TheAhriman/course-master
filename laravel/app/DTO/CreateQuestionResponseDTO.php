<?php

namespace App\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class CreateQuestionResponseDTO extends Data
{
    public function __construct(
        public string $answer,
        public bool $correct,
        public bool $enabled,
        public int $question_id
    )
    {
    }
}
