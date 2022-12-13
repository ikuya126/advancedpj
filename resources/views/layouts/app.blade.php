<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
	</head>

	<body style=margin:0px;>

    <style>

    .container {
        height:100vh;
    }


    header {
        height:13%;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    footer {
        height:8%;
        font-weight:bold;
        background-color:white;
        text-align:center;
        position:relative;
    }

    .end-title{
        position:absolute;
        top:50%;
    }

    </style>

    <div class="container">

        <header>
            <h1 >Atte</h1>
            <div class="header-links">
                <a href="/attendance" >ホーム</a>
                <a href="/date" >日付一覧</a>
                <a href="/logout">ログアウト</a>
            </div>
        </header>

        @yield('content')

        <footer>
        <small class="end-title">Atte,inc</small>
        </footer>

    </div>
    
    </body>

</html>
