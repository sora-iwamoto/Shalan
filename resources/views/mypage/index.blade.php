@push('home_index_styles')
    <link href="{{ asset('css/mypage/index.css') }}" rel="stylesheet" />
@endpush
@push('home_index_script')
   <script src="{{ asset('js/home/index.js') }}"></script>
@endpush 
@php
  use Illuminate\Support\Facades\Auth;
@endphp
<x-app-layout>
<div class="mypage">
    <h1 class="myName">{{auth()->user()->name}}</h1>
    <a href="/mapage/frinends/{{auth()->user()->id}}" class="myFriend">友達 {{($followLists->count())}}人</a>
    <form method="POST" action="{{ route('logout') }}" class="logout">
        @csrf
        <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log Out') }}
        </a>
    </form>
</div>
@foreach($mypagePosts as $mypage)
    <div class="post">
        <form action="home/{{$mypage->id}}" method="POST" id="form_{{$mypage->id}}">
            @csrf
            @method('DELETE')
            <input type="button" class="postDelete" onclick="hidePost({{$mypage->id}})" value="×"/>    
        </form>
        <div class="postData">
            <div class="poster">{{$mypage->user->name}}</div>
            <div class="postDate">{{$mypage->created_at->format('m月d日 H:i') }}</div>
        </div>
        <div class="postBody">{{$mypage->body}}</div>
    </div>
@endforeach
</x-app-layout>
