<x-app-layout>
    
@foreach($homes as $home)
    <div>
        <div>
            {{$home->body}}
            {{$home->user->name}}
        </div>
    </div>
@endforeach

    
</x-app-layout>

