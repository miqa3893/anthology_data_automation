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

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

        <title>{{config('utils.app_name')}}</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('index')}}">{{config('utils.app_name')}}</a>
        @auth
            <div class="d-none d-lg-block">
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
            </div>

            <div class="d-block d-lg-none">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#listedData" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="listedData">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.index')}}">マイページトップ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">ログアウト</a>
                        </li>
                    </ul>
                </div>
            </div>

        @endauth
    </nav>

    @yield('contents')

    <footer class="fixed-bottom text-center mt-5" style="font-size: 10px; background: #b3b7bb">
        <p class="font-italic mt-3">このシステムは、同人サークル<a href="https://twitter.com/miqa3983"> 「Sewing Future（ソーイング・フューチャー）」</a>が開発・運営を行っています。</p>
    </footer>

{{--    <footer class="py-2 bg-light text-muted text-center text-small">--}}
{{--        <p class="mb-1">ふったー</p>--}}
{{--    </footer>--}}

</body>
