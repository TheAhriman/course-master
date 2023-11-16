<?php

namespace App\Repositories;

use App\Models\ChatMessage;
use App\Repositories\Interfaces\ChatMessageRepositoryInterface;

class ChatMessageRepository extends BaseRepository implements ChatMessageRepositoryInterface
{
    /**
     * @param ChatMessage $chatMessage
     */
    public function __construct(ChatMessage $chatMessage)
    {
        parent::__construct($chatMessage);
    }
}
