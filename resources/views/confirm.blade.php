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


        <title>合同誌ファイルちぇっかー アップロード</title>
    </head>

    <body>
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <span class="navbar-text">合同誌ファイルちぇっかー</span>
    </nav>

        <nav aria-label="パンくずリスト">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">提出データの入力</li>
                <li class="breadcrumb-item active" aria-current="page">入力内容確認</li>
            </ol>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <p class="lead">以下の内容で提出します。よろしいですか？</p>
                </div>
                <div class="col-2"></div>
            </div>

            <table class="table table-striped">
                <tr><td>タイトル</td><td>{{$data["inputs"]["title"]}}</tr>
                <tr><td>感想</td><td>{{$data["inputs"]["comment"]}}</tr>
                <tr><td>使用キャラ</td><td>{{$data["inputs"]["characters"]}}</tr>
                <tr><td>使用年度</td><td>{{$data["inputs"]["years"]}}</tr>
                <tr><td>作品ファイル</td><td>{{$data["inputs"]["work"]}}</tr>
                <tr><td>寄せ書きファイル</td><td>{{$data["inputs"]["graffito"]}}</tr>
            </table>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <form action="#" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
{{--                        <input type="hidden" value="{{$data["raw"]}}">--}}
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="提出">
                        </div>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
        </div>

    </body>
</html>
