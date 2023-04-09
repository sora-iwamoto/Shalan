<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow ($useId) {
        Auth::user()->follows()->attach($useId);
        return ;
    }
    
    public function unfollow($userId)
    {
        Auth::user()->follows()->detach($userId);
        return;
    }
}
