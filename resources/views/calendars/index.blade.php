<<<<<<< HEAD
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
=======
@push('home_index_styles')
    <link href="{{ asset('css/calendar/index.css') }}" rel="stylesheet" />
@endpush
@push('home_index_script')
   <script src="{{ asset('js/calendar/index.js') }}"></script>
@endpush
<x-app-layout>
  <div class="calendarHead">
    <button type="button" class="back">←</button>
    <span class="CalendarTitle"></span>
    <button type="button" class="next"> →</button>
  </div>

  <div class="calendarContent">
    <table>
      <thead>
        <tr>
          <th class="holiday">日</th>
          <th>月</th>
          <th>火</th>
          <th>水</th>
          <th>木</th>
          <th>金</th>
          <th class="holiday">土</th>
        </tr>
      </thead>
      <tbody class='date'>
      </tbody>
    </table>
  </div>
>>>>>>> e0546c17c16c0b2498d339858229ee9991e040a4
</x-app-layout>
