<?php

namespace App\Enums;

enum ExaminationTypeEnum: string
{
    case INPUT = "Текстовое поле";
    case RADIO = "Один из списка";

    public static function toArray(): array
    {
        return array_map(fn($res) => $res->value, self::cases());
    }
}
