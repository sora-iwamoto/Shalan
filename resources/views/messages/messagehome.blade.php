@push('home_index_styles')
    <link href="{{ asset('css/message/messagehome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/message/index.css') }}" rel="stylesheet" />
@endpush
@push('home_index_script')
   <script src="{{ asset('js/message/index.js') }}"></script>
@endpush
@php
  use Illuminate\Support\Facades\Auth;
@endphp
<x-app-layout>
    <div class="message">
        <div class="messageUserBar">
            @foreach ($followers as $follower)
                <a href="/message/{{$follower['followId']}}" class="receiverLink">
                    <image src="{{!empty($follower['img_path']) ? asset($follower['img_path']) : 'https://res.cloudinary.com/depnui5g2/image/upload/v1682832632/myicon_hfjduw.png'}}" class="messageUserImg messageUserData"></image>
                    <div class="messageUserData">
                        <div class="receiverName">{{$follower['name']}}</div>
                        <div class="latestMessage">{{$follower['latestMessage']}}</div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="messageMain">
            <div class="messageStart">
                会話を開始しましょう！
            </div>
        </div>
    </div>
    <script>
      var loginName = @json(auth()->user()->name);
    </script>
</x-app-layout>
