<?php

namespace App\DTO;

class CreateAboutCourseDTO
{
    public function __construct(public string $value, public string $audience, public string $requirements)
    {
    }
}
