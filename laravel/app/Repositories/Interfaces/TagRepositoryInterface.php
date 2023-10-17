<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface TagRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $id
     * @return Model|null
     */
    public function findByIdWithPosts($id): ?Model;
}
