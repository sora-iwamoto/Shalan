<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Follow;

class Message extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user',
        'content',
        'user_id',
        'receiver_id'
    ];
    
    public function user () {
        return $this->belongsTo(User::class);
    }
    
    public function getFollower (Follow $follow) {
        $followers = $follow->myPageFollow();
        foreach ($followers as $follow) {
            $followedId = $follow->followed_user_id;
            $followingId = $follow->user_id;
            $followersName = User::find($followedId)->name;
            $followersLatestMessage = $this
            ->where(function ($message) use ($followedId, $followingId){
                $message->where('user_id', $followedId)->where('receiver_id', $followingId);
            })
            ->orWhere(function ($message) use ($followedId, $followingId){
                $message->where('user_id', $followingId)->where('receiver_id', $followedId);
            })
            ->orderBy('created_at', 'DESC')
            ->select('content')
            ->first();
            
            if (empty($followersLatestMessage)) {
                $followersLatestMessage = '';
            } else {
                $followersLatestMessage = $followersLatestMessage->cotennt;
            }
            
            $followersInfo[] = ['name' => $followersName, 'latestMessage' => $followersLatestMessage, 'followId' => $followedId];
        }
        return $followersInfo;
    }
    
    public function getMessage($receiver) {
        return $this -> where('user_id', auth()->user()->id)->where('receiver_id', $receiver)
        ->where(function ($message) use ($receiver){
                $message->where('user_id', auth()->user()->id)->where('receiver_id', $receiver);
        })
        ->orWhere(function ($message) use ($receiver){
                $message->where('user_id', $receiver)->where('receiver_id', auth()->user()->id);
        })->get();
    }
}
