<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>打刻ページ</title>
</head>

<body style="margin:0px;">
  <style>
  </style>
  <header>
    <h1>Atte</h1>
    <div class="direction">
      <a href="/attendance" >ホーム</a>
      <a href="/date" >日付一覧</a>
      <a href="/login">ログアウト</a>
</header>

  <div class="top-text">
    <h2><?php $user = Auth::user(); ?>{{ $user->name}}さんお疲れ様です</h2>
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
  <div class="copyright">
  <small>Atte,inc</small>
  </div>
</body>

</html>