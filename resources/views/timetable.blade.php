@extends('layouts.app')

@section('title')
打刻ページ
@endsection

@section('content')

<div class="date">
  <form actioin="date" method="POST">
    @csrf
    <input type="hidden" name="date" value="{{ $attendances }}">
    <input type="submit" class="date_button" name="before" value="<">

    <input type="submit" class="date_button" name="after" value=">">
  </form>
  <table>
    <div class="infomation">
      <tr>
        <th class="name">名前</th>
        <th class="start">勤務開始</th>
        <th class="end">勤務終了</th>
        <th class="resttime">休憩時間</th>
        <th class="worktime">勤務時間</th>
      </tr>
    </div>
    @foreach($attendances as $attendance)
      <tr>
        <td class="">{{ $attendance->name }}</td>
        <td class="">{{ $attendance->work_start }}</td>
        <td class="">{{ $attendance->work_end }}</td>
        <td class="">{{ $attendance->work_time }}</td>
        <td class="">{{ $attendance->rest_time }}</td>
      @endforeach
      </tr>
  </table>
</div>

@endsection