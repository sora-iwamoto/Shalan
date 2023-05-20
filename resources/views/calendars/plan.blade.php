@push('calendar_plan_styles')
    <link href="{{ asset('css/calendar/plan.css') }}" rel="stylesheet" />
@endpush
@push('calendar_plan_script')
<script src="{{ asset('js/calendar/plan.js') }}"></script>
@endpush
<x-app-layout>
  <form action='/plan/schedule' method='post'>
    @csrf
    <p>タイトル</p>
    <input type='text' placeholder='タイトルの入力' name='plan[title]' />
    <p>日付</p>
    <div class='date'>
      <div class='start'>
        <input type='text' class='startDate' value="{{$year}}年{{$month}}月 {{$date}}日" name='plan[startDate]' />
      </div>
      <span class='to'> - </span>
      <div class='end'>
        <input type='text' class='endDate' value="{{$year}}年{{$month}}月 {{$date}}日" name='plan[endDate]' />
      </div>
    </div>
    <input type='button' value='時間を指定する' class='selectTime' />
    <p>場所</p>
    <input type='text'  name='plan[place]' id='place' />
    <div id='map'></div>
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
    <input type='submit' />
  </form>
</x-app-layout>
