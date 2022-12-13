    <!DOCTYPE html>
    <html lang="ja">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録ページ</title>
    </head>

    <body style="margin:0px;">
    <style>
        body {
        background-color:white;
        width:100%;
        }
        h1 {
        margin:0px;
        }

        a {
        text-decoration:none;
        }
        
        .title {
        background-color:white;
        padding-top:14px;
        padding-bottom:14px;
        padding-left:35px;
        }

        .text1 {
        text-align:center;
        margin-top:50px;
        }

        li {
        color:red;
        font-weight:bold;
        }

        .form {
        display:flex;
        flex-direction:column;
        align-items:center;
        }

        input {
        height:50px;
        width:500px;
        border-radius:5px;
        border:3px solid #a9a9aa;
        margin-top:20px;
        box-shadow:2px;
        
        }
        
        .register-button {
        width:500px;
        height:50px;
        background-color:#4169E1;
        color:white;
        cursor: pointer;
        }

        .text2 {
        text-align:center;
        margin-top:25px;
        }

        p {
        margin:0px;
        font-size:20px;
        font-weight:bold;
        color: #a9a9a9;
        }
        
        .login-button {
        text-align:center;
        margin-bottom:12%;
        color:#4169E1;
        cursor: pointer;
        }

        .copyright {
        margin-top:500px;
        font-weight:bold;
        background-color:white;
        text-align:center;
        }
    </style>

    <div class="title">
        <h1>Atte</h1>
    </div>
    <div class="text1">
        <h2>会員登録</h2>
    </div>

    <form action="/register" method="POST">
        @csrf
    <div class="form">
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif    
        <input type="text" placeholder="名前" name="name" >
        <input type="text" name="email" placeholder="メールアドレス" >
        <input type="password" name="password" placeholder="パスワード" >
        <input type="password" name="check" placeholder="確認用パスワード" >
        <div class="register">
            <input type="submit" value="会員登録" class="register-button">
        </div>
    </div>

    </form>
    <div class="text2">
        <p>アカウントをお持ちの方はこちらから</p>
    </div>
    <div class="login-button">
        <a href="/login">ログイン</a>
    </div>

    <div class="copyright">
        <small>Atte,inc</small>
    </div>
    </body>

    </html>