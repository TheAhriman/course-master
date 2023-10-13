<?php

namespace App\Http\Services\Interfaces;

use App\Http\Requests\Post\StoreRequest;
use http\Env\Request;

interface PostServiceInterface extends BaseServiceInterface
{
    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function updateById(int $id, array $data): void;
}
