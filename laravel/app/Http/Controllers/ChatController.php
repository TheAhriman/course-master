<?php

namespace App\Http\Controllers;

use App\DTO\ChatMessage\CreateChatMessageDTO;
use App\Events\ChatMessageSent;
use App\Http\Requests\StoreChatMessageRequest;
use App\Http\Services\ChatMessageService;
use App\Http\Services\ChatService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct(private readonly ChatService $chatService, private readonly ChatMessageService $chatMessageService)
    {
    }

    public function index()
    {
        $chats = $this->chatService->paginate();

        return view('chats.index', compact('chats'));
    }

    public function show(string $id)
    {
        $chat = $this->chatService->findFirstById($id);
        $messages = $this->chatMessageService->getByChatId($chat->id);

        return view('chats.show', compact(['chat','messages']));
    }

    public function storeMessage(StoreChatMessageRequest $request)
    {
        $chatMessage = $this->chatMessageService->create(new CreateChatMessageDTO(...$request->validated()));
        broadcast(new ChatMessageSent($chatMessage->resource))->toOthers();
    }
}
