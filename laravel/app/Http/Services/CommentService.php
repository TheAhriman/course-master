<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentService extends BaseService
{
    /**
     * @param CommentRepositoryInterface $repository
     */
    public function __construct(CommentRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
