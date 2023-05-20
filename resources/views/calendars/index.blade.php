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
</x-app-layout>
