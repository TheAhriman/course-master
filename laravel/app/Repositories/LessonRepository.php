<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Repositories\Interfaces\LessonRepositoryInterface;

class LessonRepository extends BaseRepository implements LessonRepositoryInterface
{
    /**
     * @param Lesson $lesson
     */
    public function __construct(Lesson $lesson)
    {
        parent::__construct($lesson);
    }
}
