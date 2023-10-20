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

    public function getAll(?int $limit = null): ResourceCollection
    {
        return new LessonCollection(parent::getAll($limit));
    }

    public function getAllTrashed(?int $limit = null): ResourceCollection
    {
        return new LessonCollection(parent::getAllTrashed($limit));
    }

    public function findFirst(string $value, ?array $option = [], ?array $columns = ['*'], ?string $condition = 'id'): JsonResource
    {
        return new LessonResource(parent::findFirst($value, $option, $columns, $condition));
    }

    public function findOnlyTrashedById(int $id): JsonResource
    {
        return new LessonResource(parent::findOnlyTrashedById($id));
    }

    public function findWithTrashedById(int $id): JsonResource
    {
        return new LessonResource(parent::findWithTrashedById($id));
    }
}
