<?php

namespace App\Repositories;

use App\Http\Resources\LessonCollection;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use App\Repositories\Interfaces\LessonRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Js;

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
