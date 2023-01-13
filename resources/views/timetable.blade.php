@extends('layouts.app')

@section('title')
打刻ページ
@endsection

@section('content')

<style>

    h1 {
      padding-left:35px;
    }

    .main {
      height:79%;
      width:100vw;
      background-color :#DCDCDC;
    }


    h2 {
      font-size:40px;
    }

    p{
      display:inline-block;
      font-weight:bold;
      font-size:25px;
      margin:25px 20px;
    }

    .date{
      text-align:center;
      display:flex;
      flex-direction:column;
    }

    .timetable{
      width:90%;
      margin-left:250px;
    }

    table {
      border-collapse:collapse;
    }

    th{
      border-top:1.5px solid #a9a9a9;
      border-bottom:1.5px solid #A9A9A9;
      font-size:25px;
      padding:20px 120px;
    }

    td {
      border-bottom:1.5px solid #A9A9A9;
      padding:20px 120px;
    }

    .date-button {
      font-size:20px;
      color:#0000FF;
      font-weight:bold;
      border:solid 1px #0000FF;
      cursor: pointer;
    }

    
  </style>

<div class="main">
  <div class="date">
    <form actioin="date" method="POST">
      @csrf
      <input type="submit" class="date-button" name="before" value="<">
      <p>{{$today}}</p>
      <input type="submit" class="date-button" name="after" value=">">
    </form>
  </div>
  <div class="timetable">
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
            <td >{{$attendance->getName()}}</td>
            <td >{{$attendance->work_start}}</td>
            <td >{{$attendance->work_end}}</td>
            <td >{{$attendance->rest_time}}</td>
            <td >{{$attendance->work_time}}</td>
          @endforeach
          </tr>
      </table>
    </div>
  </div>
</div>
@endsection