<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatbotRequest;
use App\Http\Resources\ChatbotResource;
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
        return ChatbotResource::collection($chatbots);
    }

    /**
     * Store a newly created chatbot entry.
     */
    public function store(ChatbotRequest $request)
    {
        $chatbot = ChatBot::create($request->validated());
        return new ChatbotResource($chatbot);
    }

    /**
     * Display the specified chatbot entry.
     */
    public function show(ChatBot $chatbot)
    {
        return new ChatbotResource($chatbot);
    }

    /**
     * Update the specified chatbot entry.
     */
    public function update(ChatbotRequest $request, ChatBot $chatbot)
    {
        $chatbot->update($request->validated());
        return new ChatbotResource($chatbot);
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
