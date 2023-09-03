@push('calendar_plan_styles')
    <link href="{{ asset('css/calendar/plan.css') }}" rel="stylesheet" />
@endpush
@push('calendar_plan_script')
<script src="{{ asset('js/calendar/plan.js') }}"></script>
@endpush
<x-app-layout>
  <form action='/plan/schedule' method='post'>
    @csrf
    <p class='Message'></p>
    <p>タイトル</p>
    <input type='text' placeholder='タイトルの入力' name='plan[title]' class='required' />
    <p>日付</p>
    <div class='date'>
      <div class='start'>
        <input type='text' class='startDate' value="{{$year}}/{{$month}}/{{$date}}" />
        <input type='hidden' id='startDate' class='required' value="{{$year}}/{{$month}}/{{$date}}" name='plan[startDate]' />
      </div>
      <span class='to'> - </span>
      <div class='end'>
        <input type='text' class='endDate' value="{{$year}}/{{$month}}/{{$date}}" />
        <input type='hidden' id='endDate' class='required' value="{{$year}}/{{$month}}/{{$date}}" name='plan[endDate]' />
      </div>
    </div>
    <input type='button' value='時間を指定する' class='selectTime' />
    <div class='memberForm'>
      <p>メンバー</p>
      <input type='text' name='plan[member]' class='member'/>
      <div class='searchMember'><ui class='memberList'></ui></div>
      <div class='participants'>
        <div class='eachParticipant'>{{auth()->user()->name}}</div>
        <input type='hidden' value="{{auth()->user()->name}}" />
      </div>
    </div>
    <p>メモ</p>
    <textarea name='plan[memo]' ></textarea>
    <input type='submit' class='submitBtn' />
  </form>
</x-app-layout>
