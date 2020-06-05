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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">


        <title>{{env('APP_NAME')}}</title>
    </head>

    <body>
        <nav class="navbar fixed-top navbar-dark bg-dark">
            <span class="navbar-text">{{env('APP_NAME')}}</span>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <p id="lead_index" class="lead">{{ Config::get('utils.project_name') }}のデータを提出できます。</p>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <p id="text_index">続行するにはTwitterでログインしてください。</p>
                    <a href="{{route('login')}}" class="btn btn-primary" role="button">Twitter ログイン</a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>

    </body>
</html>
