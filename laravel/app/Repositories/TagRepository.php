<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        parent::__construct($tag);
    }

    /**
     * @param $id
     * @return Model|null
     */
    public function findByIdWithPosts($id): ?Model
    {
        return $this->findById($id)->load('posts');
    }

    public function findByIdTrashedWithPosts($id): ?Model
    {
        return $this->findOnlyTrashedById($id)->load('posts');
    }
}
