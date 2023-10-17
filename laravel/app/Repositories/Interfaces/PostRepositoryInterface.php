<?php

namespace App\Repositories\Interfaces;

use App\Http\Resources\PostResource;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function findById(int $id): PostResource;

    /**
     * @param array $attachTagsData
     * @return void
     */
    public function attachTags(array $attachTagsData) : void;

    /**
     * @param array $syncTagsData
     * @return void
     */
    public function syncTags(array $syncTagsData) : void;
}
