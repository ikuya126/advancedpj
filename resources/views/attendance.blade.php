<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>打刻ページ</title>
</head>

<body style="margin:0px;">
  <style>

    .container {
      height:100vh;
    }

    header {
      height:10%;
      display:flex;
      justify-content:space-between;
      align-items:center;
    }

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
      height:80%;
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
      
    }

    
  </style>

  <div class="container">

    <header>
      <h1 >Atte</h1>
      <div class="header-links">
        <a href="/attendance" >ホーム</a>
        <a href="/date" >日付一覧</a>
        <a href="/logout">ログアウト</a>
    </header>

    <div class="main">

      <div class="top-text">
        <h2><?php $user = Auth::user(); ?>{{ $user->name}}さんお疲れ様です!</h2>
      </div>
      <div class="button-box">
        <div class="top-button">
        <form action="" method="GET">
          @csrf
          <input type="submit" value="勤務開始" >
        </form>
        <form action="" method="POST">
          @csrf
          <input type="submit" value="勤務終了" >
        </form>
        </div>
        <div class="bottom-button">
        <form action="" method="GET">
          @csrf
          <input type="submit" value="休憩開始" >
        </form>
        <form action="" method="POST">
          @csrf
          <input type="submit" value="休憩終了" >
        </form>
        </div>
      </div>
    </div>
    <footer>
    <small>Atte,inc</small>
    </footer>

  </div>

</body>

</html>