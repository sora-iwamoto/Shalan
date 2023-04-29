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
                    <div class="receiverName">{{$follower['name']}}</div>
                    <div class="latestMessage">{{$follower['latestMessage']}}</div>
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
