@push('home_index_styles')
    <link href="{{ asset('css/home/index.css') }}" rel="stylesheet">
@endpush
<x-app-layout>
@foreach($homes as $home)
    <div class="post">
        <div class="postData">
            <div class="poster">{{$home->user->name}}</div>
            <div class="postDate">{{ $home->created_at->format('m月d日 H:i') }}</div>
        </div>
        <div class="postBody">{{$home->body}}</div>
    </div>
@endforeach
</x-app-layout>

