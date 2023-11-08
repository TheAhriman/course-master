<?php

namespace App\DTO\UserTakenCourse;

use Spatie\LaravelData\Data;

class SetStatusUserTakenCourseDTO extends Data
{
    public function __construct(
        public string $status)
    {
    }
}
