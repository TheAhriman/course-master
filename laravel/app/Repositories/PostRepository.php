<?php

namespace App\Repositories;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * RoleRepository constructor
     *
     * @param Post $post
     */
    public function __construct(Post $post, PostResource $resource)
    {
        parent::__construct($post, $resource);
    }

    public function findById(int $id): PostResource
    {
        return new PostResource(parent::findById($id));
    }

    /**
     * @param array $data
     * @return Model|null
     */
    public function create(array $data) : ?Model
    {
        $post = parent::create($data["post"]);
        if (array_key_exists('tagIds',$data)){
            $attachTagsData = [
                "post" => $post,
                "tagsIds" => $data["tagIds"]
            ];
            $this->attachTags($attachTagsData);
        }

        return $post;
    }

    /**
     * @param int $id
     * @param array $data
     * @return Model|null
     */
    public function updateById(int $id, array $data): ?Model
    {
        $post = parent::updateById($id, $data['post']);
        if(array_key_exists('tagIds',$data)){
            $tagsIds = $data['tagIds'];
            unset($data['tagIds']);
            $syncTagsData = [
                'post' => $post,
                'tagsIds' => $tagsIds
            ];
            $this->syncTags($syncTagsData);
        }
        return $post;
    }

    /**
     * @param array $attachTagsData
     * @return void
     */
    public function attachTags(array $attachTagsData): void
    {
        $attachTagsData['post']->tags()->attach($attachTagsData['tagsIds']);
    }

    /**
     * @param array $syncTagsData
     * @return void
     */
    public function syncTags(array $syncTagsData) : void
    {
        $syncTagsData['post']->tags()->sync($syncTagsData['tagsIds']);
    }
}
