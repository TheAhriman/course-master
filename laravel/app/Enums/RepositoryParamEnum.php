<?php

namespace App\Enums;

enum RepositoryParamEnum: string
{
    case SELECT = 'select';
    case WITH = 'with';
    case LIMIT = 'limit';
    case WITH_COUNT = 'withCount';
}
