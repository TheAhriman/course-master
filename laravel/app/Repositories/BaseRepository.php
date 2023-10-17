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
     * BaseRepository constructor
     *
     * @param Model $model
     */
    public function __construct(protected Model $model)
    {
    }

    /**
     * @param int|null $limit
     * @return ResourceCollection
     */
    public function getAll(?int $limit = null): ResourceCollection
    {
            return is_null($limit)
            ? new ResourceCollection($this->model->query()->get())
            : new ResourceCollection($this->model->query()->paginate($limit));
    }

    /**
     * @param int|null $limit
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function getAllTrashed(?int $limit = null): Collection|LengthAwarePaginator|array
    {
        return is_null($limit)
            ? $this->model->query()->onlyTrashed()->get()
            : $this->model->query()->onlyTrashed()->paginate($limit);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findById(int $id)
    {
        return $this->model->query()->where('id',$id)->first();
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function findWithTrashedById(int $id): ?Model
    {
        return $this->model->query()->withTrashed()->where('id', $id)->first();
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function findOnlyTrashedById(int $id): ?Model
    {
        return $this->model->query()->onlyTrashed()->where('id', $id)->first();
    }

    /**
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model
    {
        return $this->model->query()->create($data)->fresh();
    }

    /**
     * @param int $id
     * @param array $data
     * @return Model|null
     */
    public function updateById(int $id, array $data): ?Model
    {
        $model = $this->findById($id);
        $model->update($data);

        return $model->refresh();
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
