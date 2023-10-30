<?php

namespace App\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class CreateUserDTO extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public int $role_id,
    )
    {
    }
}
