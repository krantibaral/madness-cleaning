<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatBotRequest;
use App\Http\Resources\ChatBotResource;
use App\Models\ChatBot;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatbotController extends Controller
{
    /**
     * Display a listing of the chatbot entries.
     */
    public function index()
    {
        $chatbots = ChatBot::all();
        return ChatBotResource::collection($chatbots);
    }

    /**
     * Store a newly created chatbot entry.
     */
    public function store(ChatBotRequest $request)
    {
        $chatbot = ChatBot::create($request->validated());
        return new ChatBotResource($chatbot);
    }

    /**
     * Display the specified chatbot entry.
     */
    public function show(ChatBot $chatbot)
    {
        return new ChatBotResource($chatbot);
    }

    /**
     * Update the specified chatbot entry.
     */
    public function update(ChatBotRequest $request, ChatBot $chatbot)
    {
        $chatbot->update($request->validated());
        return new ChatBotResource($chatbot);
    }

    /**
     * Remove the specified chatbot entry.
     */
    public function destroy(ChatBot $chatbot)
    {
        $chatbot->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
