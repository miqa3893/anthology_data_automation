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
                    <p id="lead_index" class="lead">ログインに失敗しました。合同誌の参加者ではないか、参加表明時からTwitterIDが変更されている可能性があります。<br>システム管理者までご連絡ください。</p>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <a href="{{route('index')}}" class="btn btn-primary" role="button">ホームに戻る</a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>

    </body>
</html>
