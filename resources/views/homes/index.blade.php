@push('home_index_styles')
    <link href="{{ asset('css/home/index.css') }}" rel="stylesheet" />
@endpush
@push('home_index_script')
   <script src="{{ asset('js/home/index.js') }}"></script>
@endpush   
<x-app-layout>
@foreach($homes as $home)
    <div class="post">
        <form action="home/{{$home->id}}" method="POST" id="form_{{$home->id}}">
            @csrf
            @method('DELETE')
            <input type="button" class="postDelete" onclick="hidePost({{$home->id}})" value="×"/>    
        </form>
        <div class="postData">
            <div class="poster">{{$home->user->name}}</div>
            <div class="postDate">{{ $home->created_at->format('m月d日 H:i') }}</div>
        </div>
        <div class="postBody">{{$home->body}}</div>
    </div>
@endforeach
</x-app-layout>
