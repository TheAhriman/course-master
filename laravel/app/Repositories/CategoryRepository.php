<?php

namespace App\Repositories;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Js;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function getAll(?int $limit = null): ResourceCollection
    {
        return new CategoryCollection(parent::getAll($limit));
    }

    public function getAllTrashed(?int $limit = null): ResourceCollection
    {
        return new CategoryCollection(parent::getAllTrashed($limit));
    }

    public function findById(string $value, ?array $option = [], ?array $columns = ['*'], ?string $condition = 'id'): JsonResource
    {
        return new CategoryResource(parent::findById($value, $option, $columns, $condition));
    }

    public function findOnlyTrashedById(int $id): JsonResource
    {
        return new CategoryResource(parent::findOnlyTrashedById($id));
    }

    public function findWithTrashedById(int $id): JsonResource
    {
        return new CategoryResource(parent::findWithTrashedById($id));
    }
}
