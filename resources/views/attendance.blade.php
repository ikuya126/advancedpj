@extends('layouts.app')

@section('title')
打刻ページ
@endsection

  @section('content')

  <style>

    h1 {
      padding-left:35px;
    }

    .header-links {
      display:flex;
      justify-content:space-around;
      width:500px;
      margin-right:30px;
      font-size:25px;
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

    input {
      height:100%;
      width:100%;
      font-size:30px;
      font-weight:bold;
      border:0px;
      border-radius:8px;
      cursor: pointer;
    }

    .button{
      color:#DCDCDC;
    }

    
  </style>

    <div class="main">

      <div class="top-text">
        <h2><?php $user = Auth::user(); ?>{{ $user->name}}さんお疲れ様です!</h2>
      </div>
      <div class="button-box">
        <div class="top-button">
        <form action="/work_start" method="POST" class="button-form">
          @csrf
          <input type="submit" value="勤務開始" class="button">
        </form>
        <form action="/work_end" method="POST">
          @csrf
          <input type="submit" value="勤務終了" >
        </form>
        </div>
        <div class="bottom-button">
        <form action="/rest_start" method="POST">
          @csrf
          <input type="submit" value="休憩開始" >
        </form>
        <form action="/rest_end" method="POST">
          @csrf
          <input type="submit" value="休憩終了" class="button">
        </form>
        </div>
      </div>

  </div>

@endsection
