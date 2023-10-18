<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseService
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
     * @param array|null $option
     * @return JsonResource
     */
    public function getById(string $value, ?array $option = [], ?array $columns = ['*'], ?string $condition = 'id'): JsonResource
    {
        return $this->repository->findById($value, $option, $columns, $condition);
    }

    /**
     * @param int $id
     * @return JsonResource
     */
    public function getByIdTrashed(int $id): mixed
    {
        return $this->repository->findOnlyTrashedById($id);
    }

    /**
     * @param int|null $limit
     * @return ResourceCollection
     */
    public function getAll(?int $limit = null): ResourceCollection
    {
        return $this->repository->getAll($limit);
    }

    /**
     * @param int|null $limit
     * @return ResourceCollection
     */
    public function getAllTrashed(?int $limit = null): ResourceCollection
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
