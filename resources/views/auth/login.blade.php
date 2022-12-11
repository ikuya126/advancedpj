    <!DOCTYPE html>
    <html lang="ja">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
    </head>

    <body style="margin:0px;">
    <style>
        body {
        background-color:white;

        }
        .title {
        background-color:white;
        }

        h1 {
        margin:0px;
        padding-top:12px;
        padding-bottom:12x;
        padding-left:30px;
        }

        h3 {
        margin-top:50px;
        }
        
        h4 {
        font-weight:bold;
        font-size:20px;
        color: #a9a9a9;
        margin:0;
        }

        .form {
        display:flex;
        flex-direction:column;
        align-items:center;
        }

        input {
        height:50px;
        width:500px;
        border-radius:4px;
        border:3px solid #A9A9A9;
        margin-bottom:30px;
        }
        
        .register {
        text-align:center;
        }
        .text {
        text-align:center;
        margin-top:25px;
        }
        
        .login {
        margin-top:200px;
        margin-bottom:30px;
        text-align:center;
        }

        .login-button{
        text-align:center;
        width:500px;
        height:50px;
        background-color:#4169E1;
        color:white;
        cursor: pointer;
        }

        a {
        text-decoration:none;
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
    <form action="/login" method="POST">
        @csrf
        <div class="login">
        <h3>ログイン</h3>
        </div>

        <div class="form">
            <input type="text" name="email" placeholder="メールアドレス" >
            <input type="password" name="password" placeholder="パスワード" >
            <input type="submit" value="ログイン" class="login-button">
        </div>
    </form>

    <div class="text">
        <h4>アカウントをお持ちでない方はこちらから</h4>
    </div>
    <div class="register">
        <a href="register">会員登録</a>
    </div>

    <div class="copyright">
        <small>Atte,inc</small>
    </div>
    </html>