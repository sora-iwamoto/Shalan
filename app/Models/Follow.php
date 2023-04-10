<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Follow extends Model
{
    use HasFactory;
    
    public function getFollowFlg ($userId, $follower) {
        $followCon = $this -> where('user_id', $userId) -> where('followed_user_id', $follower) -> count();
        if ($followCon > 0) {
            $followFlg = true;
        } else {
            $followFlg = false;
        }
        return $followFlg;
    }
    
    public function myPageFollow () {
        $followers = $this->where('user_id', auth()->user()->id)->where('followed_user_id', '!=', auth()->user()->id)->get();
        
        return $followers;
    }
}
