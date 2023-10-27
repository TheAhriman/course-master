<?php

namespace App\DTO;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class CreateAboutCourseDTO extends Data
{
    public function __construct(
        public string $value,
        public string $audience,
        public string $requirements)
    {
    }
}
