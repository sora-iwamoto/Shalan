<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyPage;
use App\Models\Follow;
use App\Models\User;

class MyPageController extends Controller
{
    public function index (Mypage $mypage, Follow $follow) {
        $mypagePosts = $mypage->getPostDate();
        $followList = $follow->myPageFollow();
        return view('mypage/index')->with(['mypagePosts' => $mypagePosts, 'followLists' => $followList]);  
    }
    
    public function delete (Mypage $mypage) {
        $mypage->delete();
        return redirect('/mypage');  
    }
    
    public function friend(Follow $follow, User $user)
    {
        $followList = $follow->myPageFollow();
        foreach ($followList as $follower) {
            $follower['name'] = $user::find($follower->followed_user_id)->name;
            $follower['followerFlg'] = $follow->getFollowFlg(auth()->id(), $follower->followed_user_id);
        }
        
        return view('mypage/friend')->with(['followLists' => $followList]);  
    }
}
