@push('search_index_styles')
    <link href="{{ asset('css/search/index.css') }}" rel="stylesheet" />
@endpush
@push('follow_script')
   <script src="{{ asset('js/follow/index.js') }}"></script>
@endpush
@php
  use Illuminate\Support\Facades\Auth;
@endphp
<x-app-layout>
<div>
    
</div>
@foreach($followLists as $follow)
    <div class="userEach">
        <div class="userName">{{$follow->name}}</div>
        <input type="hidden" value="{{$follow->id}}" class="userId" />
        <input type="button" value={{($follow->followerFlg) ? "友達": "友達になる"}} class="js-followButton follow follower{{$follow->id}}" />
    </div>
@endforeach
</x-app-layout>
