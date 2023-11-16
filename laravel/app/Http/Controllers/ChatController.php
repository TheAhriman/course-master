<?php

namespace App\Http\Controllers;

use App\Http\Services\ChatService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct(private readonly ChatService $chatService)
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

        return view('chats.show', compact('chat'));
    }
}
