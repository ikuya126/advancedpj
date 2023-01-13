@extends('layouts.app')

@section('title')
打刻ページ
@endsection

  @section('content')

  <style>

    h1 {
      padding-left:35px;
    }

    a {
      text-decoration:none;
      color:black;
      cursor: pointer;
      font-weight:bold;
    }

    .main {
      height:79%;
      background-color :#DCDCDC;
    }

    .top-text{
      padding-top:50px;
      height:100px;
      text-align:center;
    }

    h2 {
      font-size:40px;
    }
    
    .button-box {
      text-align:center;
      width:100vw;
      height:70%;
      display:flex;
      flex-direction:column;
      align-items:center;
    }

    .top-button {
      width:60%;
      height:50%;
      display:flex;
      justify-content:space-between;
    }

    .bottom-button {
      width:60%;
      height:50%;
      display:flex;
      justify-content:space-between;
    }

    form{
      width:50%;
      display:flex;
      align-items:center;
      padding: 35px 30px;
    }

    button {
      height:100%;
      width:100%;
      font-size:30px;
      font-weight:bold;
      border:0px;
      border-radius:8px;
      cursor: pointer;
    }

    
  </style>


    <div class="main">

      <div class="top-text">
        <h2><?php $user = Auth::user(); ?>{{ $user->name}}さんお疲れ様です!</h2>
      </div>
      <div class="button-box">
        <div class="top-button">
        <form action="/work_start" method="POST" class="button-form" name="start">
          @csrf
        <button type="submit"  id="startButton" >勤務開始</button>
        </form>
        <form action="/work_end" method="POST" name="end">
          @csrf
        <button type="submit" id="endButton" >勤務終了</button>
        </form>
        </div>
        <div class="bottom-button">
        <form action="/rest_start" method="POST" name="rest-start">
          @csrf
          <button type="submit"  id="restInButton" >休憩開始</button>
        </form>
        <form action="/rest_end" method="POST" name="rest-end">
          @csrf
          <button type="submit"  id="restOutButton" >休憩終了</button>
        </form>

        </div>
      </div>
    <script>     
          document.addEventListener('DOMContentLoaded',function() {
          
          var start = @json($start);
          var end = @json($end);
          var rest_start = @json($rest_start);
          var rest_end = @json($rest_end);

          const startButton = document.getElementById('startButton');
          const endButton = document.getElementById('endButton');
          const restInButton = document.getElementById('restInButton');
          const restOutButton = document.getElementById('restOutButton');

          document.getElementById("rest_end").setAttribute("disabled", true);
          document.getElementById("rest_start").setAttribute("disabled", true);
          document.getElementById("endButton").setAttribute("disabled", true);

          if(!empty($start)){
            startButton.disabled = true;
            endButton.disabled = false;
            restInButton.disabled = false;
          }elseif(!rest_start == 0){

          }
          
          },false);

          const rest_start = document.getElementById('rest-start');

          rest_start.addEventListener('load',function() {
          if(!empty($rest_start)){
          document.getElementById("rest-end").removeAttribute("disabled");
          document.getElementById("start").setAttribute("disabled", true);
          document.getElementById("rest-start").setAttribute("disabled", true);
          document.getElementById("end").setAttribute("disabled", true);
          }
          
          }, false);

          const rest_end = document.getElementById('rest-end');

          rest_end.addEventListener('load',function() {
          if(!empty($rest_end)){
          document.getElementById("rest-start").removeAttribute("disabled");
            document.getElementById("end").removeAttribute("disabled");
            document.getElementById("start").setAttribute("disabled", true);
            document.getElementById("rest-end").setAttribute("disabled", true);
          }
          
          }, false);

          const end = document.getElementById('end');

          end.addEventListener('load',function() {
          if(!empty($end)){
          document.getElementById("start").setAttribute("disabled", true);
            document.getElementById("rest-start").setAttribute("disabled", true);
            document.getElementById("rest-end").setAttribute("disabled", true);
          }
          
          }, false);


        </script>
    </div>

@endsection
