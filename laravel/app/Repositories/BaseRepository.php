<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @param Model $model
     */
    public function __construct(protected Model $model)
    {
    }

    /**
     * @param int|null $limit
     * @return mixed
     */
    public function getAll(?int $limit = null): mixed
    {
            return is_null($limit)
            ? $this->model->query()->get()
            : $this->model->query()->paginate($limit);
    }

    /**
     * @param int|null $limit
     * @return ResourceCollection
     */
    public function getAllTrashed(?int $limit = null): mixed
    {
        return is_null($limit)
            ? $this->model->query()->onlyTrashed()->get()
            : $this->model->query()->onlyTrashed()->paginate($limit);
    }

    /**
     * @param string $value
     * @param array|null $option
     * @param array|null $columns
     * @param string|null $condition
     * @return mixed
     */
    public function findById(string $value, ?array $option = [], ?array $columns = ['*'], ?string $condition = 'id'): mixed
    {
        return $this->model->query()->select($columns)->where($condition,$value)->with($option)->first();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findWithTrashedById(int $id): mixed
    {
        return $this->model->query()->withTrashed()->where('id', $id)->first();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOnlyTrashedById(int $id): mixed
    {
        return $this->model->query()->onlyTrashed()->where('id', $id)->first();
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $this->model->query()->create($data)->fresh();
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function updateById(int $id, array $data): void
    {
        $model = $this->findById($id);
        $model->update($data);

        $model->refresh();
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->findById($id)->delete();
    }

    /**
     * @param int $id
     * @return void
     */
    public function restoreById(int $id): void
    {
        $this->findOnlyTrashedById($id)->restore();
    }

    /**
     * @param int $id
     * @return void
     */
    public function permanentlyDeleteById(int $id): void
    {
        $this->findWithTrashedById($id)->forceDelete();
    }
}
