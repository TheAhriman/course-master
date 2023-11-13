<?php

namespace App\Enums;

enum TakingExaminationStatusTypeEnum: string
{
    case LOGGED = 'logged';
    case IN_PROCESS = 'in_process';
    case FINISHED = 'finished';

    public static function toArray(): array
    {
        return array_map(fn($res) => $res->value, self::cases());
    }
}
