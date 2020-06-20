<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <title>{{env('APP_NAME')}}</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('index')}}">{{config('utils.app_name')}}</a>
        @auth
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">トップページ</a>
                </li>
                <li class="nav-item dropdown">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->twitter_name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('users.index')}}">マイページトップ</a>
                        <a class="dropdown-item" href="{{route('logout')}}">ログアウト</a>
                    </div>
                </li>
            </ul>
        @endauth
    </nav>

    @yield('contents')

</body>
