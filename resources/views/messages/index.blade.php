@push('home_index_styles')
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
            <div class="messageTitle">
                <span class="talkPeople">
                    {{$receiver->name}}
                </span>
            </div>
            <div class="messageBody">
                @foreach($messages as $message)
                <div class="eachMessage {{(auth()->user()->name === $message->name) ? 'messagerignt' : 'messageleft'}}">
                    <div class="submitTime">{{$message->created_at->format('Y/m/d H:i')}}</div>
                    <span class="recipientName">{{$message->name}}</span>
                    <div class="messageContent messageContentrignt">{{$message->content}}</div>
                </div>
                @endforeach
            </div>
            <div class="messageBox">
                <textarea class="textBox"></textarea>
                <input type="submit" class="submitButton" value="送信"  />
                <input type="hidden" class="messageName" value={{auth()->user()->name}}>
                <input type="hidden" class="messageUserId" value={{auth()->user()->id}}>
                <input type="hidden" class="messageReceivedId" value={{$receiver->id}}>
            </div> 
        </div>
    </div>
    <script>
      var loginName = @json(auth()->user()->name);
    </script>
</x-app-layout>
