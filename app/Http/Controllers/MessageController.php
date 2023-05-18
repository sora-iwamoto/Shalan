<?php

namespace App\Http\Controllers;

use App\Events\messageReceived;
use App\Models\Message;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(Message $message, User $user, Follow $follow) {
        return view('messages/index')->with(['messages' => $message->getMessage($user->id), 'receiver' => $user, 'followers' => $message->getFollower($follow)]);
    }
    
    public function store(Message $message, Request $request) {
        $message->content = $request->input('content');
        $message->name = $request->input('name');
        $message->user_id = $request->input('user_id');
        $message->receiver_id = $request->input('receiver_id');
        $message->save();
        event(new messageReceived($message));
        
        return response()->json([]);
    }
    
    public function messageHome(Message $message, Follow $follow) {
        return view('messages/messagehome')->with(['followers' => $message->getFollower($follow)]);
    }
}
