<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{

    public function getAll();


    /**
     * @param int|null $limit
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function getAllTrashed(?int $limit = null): Collection|LengthAwarePaginator|array;

    /**
     * @param int $id
     * @return Model|null
     */
    public function findById(int $id): ?Model;

    /**
     * @param int $id
     * @return Model|null
     */
    public function findWithTrashedById(int $id) : ?Model;

    /**
     * @param int $id
     * @return Model|null
     */
    public function findOnlyTrashedById(int $id) : ?Model;

    /**
     * @param array $data
     * @return Model|null
     */
    public function create(array $data) : ?Model;

    /**
     * @param int $id
     * @param array $data
     * @return Model|null
     */
    public function updateById(int $id, array $data) : ?Model;

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
