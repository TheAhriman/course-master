<?php

namespace App\Http\Services;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Services\Interfaces\PostServiceInterface;
use App\Repositories\PostRepository;
use Exception;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostService extends BaseService implements PostServiceInterface
{
    /**
     * PostService constructor
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        parent::__construct($postRepository);
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $data = $this->dividePostData($data);

        parent::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function updateById(int $id, array $data): void
    {
        $data = $this->dividePostData($data);
        parent::updateById($id, $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function dividePostData(array $data): array
    {
        if (array_key_exists('tag_id',$data)){
            $tagIds = $data['tag_id'];
            unset($data['tag_id']);
            $divided_data = ["tagIds" => $tagIds];
        }
        $divided_data['post'] = $data;

        return $divided_data;
    }
}
