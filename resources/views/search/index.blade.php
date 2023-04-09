@push('search_index_styles')
    <link href="{{ asset('css/search/index.css') }}" rel="stylesheet" />
@endpush
@push('search_index_script')
   <script src="{{ asset('js/search/index.js') }}"></script>
@endpush
@push('follow_script')
   <script src="{{ asset('js/follow/index.js') }}"></script>
@endpush
@php
  use Illuminate\Support\Facades\Auth;
@endphp
<x-app-layout>
    @foreach ($users as $user)
        <div class="userEach">
            <div class="userName">{{$user->name}}</div>
            <input type="hidden" value="{{$user->id}}" class="userId" />
            <input type="button" value={{($user->followerFlg) ? "友達": "友達になる"}} class="js-followButton follow follower{{$user->id}}" />
        </div>
    @endforeach
</x-app-layout>
