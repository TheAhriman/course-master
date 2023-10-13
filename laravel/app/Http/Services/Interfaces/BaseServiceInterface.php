<?php

namespace App\Http\Services\Interfaces;

use App\Http\Requests\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

interface BaseServiceInterface
{
    /**
     * @param int $id
     * @return Model
     */
    public function getById(int $id) : Model;

    /**
     * @param int|null $limit
     * @return LengthAwarePaginator|Builder[]|Collection
     */

    /**
     * @param int $id
     * @return Model
     */
    public function getByIdTrashed(int $id): Model;

    /**
     * @param int|null $limit
     * @return Collection|LengthAwarePaginator|array
     */
    public function getAll(?int $limit = null): Collection|LengthAwarePaginator|array;

    /**
     * @param int|null $limit
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function getAllTrashed(?int $limit = null): Collection|LengthAwarePaginator|array;

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
    public function permanentlyDeleteById(int $id) : void;

    /**
     * @param int $id
     * @return void
     */
    public function restoreById(int $id) : void;
}
