<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\BaseRepositoryInterface;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
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
