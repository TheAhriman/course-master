<?php

namespace App\Repositories;

use App\Models\Chat;
use App\Repositories\Interfaces\ChatRepositoryInterface;

class ChatRepository extends BaseRepository implements ChatRepositoryInterface
{
    /**
     * @param Chat $chat
     */
    public function __construct(Chat $chat)
    {
        parent::__construct($chat);
    }
}
