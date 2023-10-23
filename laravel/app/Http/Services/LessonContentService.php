<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\LessonContentRepositoryInterface;

class LessonContentService extends BaseService
{
    /**
     * @param LessonContentRepositoryInterface $repository
     */
    public function __construct(LessonContentRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
