<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\ChatMessageRepositoryInterface;

class ChatMessageService extends BaseService
{
    /**
     * @param ChatMessageRepositoryInterface $repository
     */
    public function __construct(ChatMessageRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
