<?php

namespace App\Repositories;

use App\Models\LessonContent;
use App\Repositories\Interfaces\LessonContentRepositoryInterface;

class LessonContentRepository extends BaseRepository implements LessonContentRepositoryInterface
{
    /**
     * @param LessonContent $lessonContent
     */
    public function __construct(LessonContent $lessonContent)
    {
        parent::__construct($lessonContent);
    }
}
