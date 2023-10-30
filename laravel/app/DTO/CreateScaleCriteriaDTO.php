<?php

namespace App\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class CreateScaleCriteriaDTO extends Data
{
    public function __construct(
        public string $title,
        public string $text,
        public int $examination_id,
    )
    {
    }
}
