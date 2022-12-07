<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
    #header{
        text-align: center;
        background-color: #162D4D;
        font-size: larger;
        border-radius: 1%;
        max-height: 90px;
    }
    img.imagen_logo{
    	width: 160px;
    	height: auto;
        position: relative;
        margin-left: 40px;
	}
    #imagen_ut{
    	width: 200px;
    	height: 160px;
        margin-top: -20px;
        margin-left: 920px; 
	}
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="row" id="header">
            <img class="imagen_logo" src="/WolfChat/resources/images/wolfchat_sin_fondo.png" alt="Logotipo_Wolfchat">
            <img id="imagen_ut" src="/WolfChat/resources/images/ut.png" alt="Logotipo_UTSJR">
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
