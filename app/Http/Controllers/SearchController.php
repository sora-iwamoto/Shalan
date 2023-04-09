<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;

class SearchController extends Controller {
    public function index(User $user, Follow $follow, Request $request) {
        $searchUser = $user->getSearchUser($request['searchName']);
        
        foreach ($searchUser as &$follower) {
            $follower['followerFlg'] = $follow->getFollowFlg(auth()->id(), $follower->id);
        }
        return view('search/index')->with(['users' => $searchUser]);
    }
}
