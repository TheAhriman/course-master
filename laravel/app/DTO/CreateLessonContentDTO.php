<?php

namespace App\DTO;

use App\Enums\LessonContentMediaTypeEnum;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class CreateLessonContentDTO extends Data
{
    public function __construct(
        public LessonContentMediaTypeEnum $media_type,
        public string $value,
        public int $lesson_id,
        public ?string $description = null
    )
    {
    }
}
