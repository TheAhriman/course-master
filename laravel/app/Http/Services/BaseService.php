<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\BaseServiceInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use http\Env\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class BaseService implements BaseServiceInterface
{
    /**
     * @var BaseRepositoryInterface
     */
    protected BaseRepositoryInterface $repository;

    /**
     * @param BaseRepositoryInterface $repository
     */
    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getById(int $id): Model
    {
        return $this->repository->findById($id);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getByIdTrashed(int $id): Model
    {
        return $this->repository->findOnlyTrashedById($id);
    }
    /**
     * @param int|null $limit
     * @return Collection|LengthAwarePaginator|array
     */
    public function getAll(?int $limit = null): Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator|array
    {
        return $this->repository->getAll($limit);
    }

    /**
     * @param int|null $limit
     * @return Collection|LengthAwarePaginator|array
     */
    public function getAllTrashed(?int $limit = null): Collection|LengthAwarePaginator|array
    {
        return $this->repository->getAllTrashed($limit);
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $this->repository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function updateById(int $id, array $data): void
    {
        $this->repository->updateById($id, $data);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->repository->deleteById($id);
    }

    /**
     * @param int $id
     * @return void
     */
    public function permanentlyDeleteById(int $id): void
    {
        $this->repository->permanentlyDeleteById($id);
    }

    /**
     * @param int $id
     * @return void
     */
    public function restoreById(int $id): void
    {
        $this->repository->restoreById($id);
    }
}
