<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\LessonRepositoryInterface;

class LessonService extends BaseService
{
    /**
     * @param LessonRepositoryInterface $repository
     */
    public function __construct(LessonRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
