<?php

namespace App\Http\Controllers;

use App\Events\messageReceived;
use App\Models\Message;
use Illuminate\Http\Request\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(Message $message) {
        return view('messages/index')->with(['messages' => $message->get()]);
    }
    
    public function store(Message $message, Request $request) {
        $message->content = $request->input('content');
        $message->name = $request->input('name');
        $message->save();
        event(new messageReceived($message));
        
        return response()->json([]);
    }
    
}
