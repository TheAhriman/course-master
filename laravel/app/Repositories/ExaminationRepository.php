<?php

namespace App\Repositories;

use App\Http\Resources\ExaminationCollection;
use App\Http\Resources\ExaminationResource;
use App\Models\Examination;
use App\Repositories\Interfaces\ExaminationRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Js;

class ExaminationRepository extends BaseRepository implements ExaminationRepositoryInterface
{
    /**
     * @param Examination $examination
     */
    public function __construct(Examination $examination)
    {
        parent::__construct($examination);
    }

    public function getAll(?int $limit = null): ResourceCollection
    {
        return new ExaminationCollection(parent::getAll($limit));
    }

    public function getAllTrashed(?int $limit = null): ResourceCollection
    {
        return new ExaminationCollection(parent::getAllTrashed($limit));
    }

    public function findById(string $value, ?array $option = [], ?array $columns = ['*'], ?string $condition = 'id'): JsonResource
    {
        return new ExaminationResource(parent::findById($value, $option, $columns, $condition));
    }

    public function findOnlyTrashedById(int $id): JsonResource
    {
        return new ExaminationResource(parent::findOnlyTrashedById($id));
    }

    public function findWithTrashedById(int $id): JsonResource
    {
        return new ExaminationResource(parent::findWithTrashedById($id));
    }
}
