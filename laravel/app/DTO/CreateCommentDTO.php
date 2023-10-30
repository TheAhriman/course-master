<?php

namespace App\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class CreateCommentDTO extends Data
{
    public function __construct(
        public int $user_id,
        public string $description,
        public int $lesson_id,
    )
    {
    }
}
