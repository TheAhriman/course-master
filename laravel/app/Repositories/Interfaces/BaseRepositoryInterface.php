<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

interface BaseRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll() : mixed;

    /**
     * @param int|null $limit
     * @return ResourceCollection
     */
    public function getAllTrashed(?int $limit = null): mixed;

    /**
     * @param string $value
     * @param array|null $option
     * @param array|null $columns
     * @param string|null $condition
     * @return mixed
     */
    public function findFirst(string $value, ?array $option = [],
        ?array $columns = ['*'], ?string $condition = 'id'): mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function findWithTrashedById(int $id) : mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function findOnlyTrashedById(int $id) : mixed;

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data) : void;

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function updateById(int $id, array $data) : void;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id) : void;

    /**
     * @param int $id
     * @return void
     */
    public function restoreById(int $id) : void;

    /**
     * @param int $id
     * @return void
     */
    public function permanentlyDeleteById(int $id) : void;
}
