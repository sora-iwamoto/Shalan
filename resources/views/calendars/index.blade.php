@push('calendar_index_styles')
    <link href="{{ asset('css/calendar/indx.css') }}" rel="stylesheet" />
@endpush
@push('calendar_index_script')
<script src="{{ asset('js/calendar/index.js') }}"></script>
@endpush
<x-app-layout>
  <div class="wrapper">
    <h1 class="header"></h1>

    <div class="next-prev-button">
        <button class="prev" onclick="prev()">‹</button>
        <button class="next" onclick="next()">›</button>
    </div>

    <div class="calendar"></div>
</div>
</x-app-layout>
