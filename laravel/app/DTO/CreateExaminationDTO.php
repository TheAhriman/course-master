<?php

namespace App\DTO;

use App\Enums\ExaminationTypeEnum;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;

class CreateExaminationDTO extends Data
{
    public function __construct(
        public string $title,
        #[WithCast(EnumCast::class, type: ExaminationTypeEnum::class)]
        public ExaminationTypeEnum $type,
        public int $lesson_id,
    )
    {
    }
}
