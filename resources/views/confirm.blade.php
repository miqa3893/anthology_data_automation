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
                <tr><td>タイトル</td><td>{{$data["title"]}}</tr>
                <tr><td>感想</td><td>{{$data["comment"]}}</tr>
                <tr><td>使用キャラ</td><td>{{$data["characters"]}}</tr>
                <tr><td>使用年度</td><td>{{$data["years"]}}</tr>
                <tr><td>作品ファイル</td><td>{{$data["workName"]}}</tr>
                <tr><td>アップロード画像</td><td><img src="/storage/public/temp_works/{{$data["workName"]}}" alt="アップロード作品ファイル"></tr>
                <tr><td>寄せ書きファイル</td><td>{{$data["graffitoName"]}}</tr>
                <tr><td>アップロード画像</td><td>
                    @if($data["graffitoName"]!='データなし')
                        <img src="/storage/public/temp_graffiti/{{$data["graffitoName"]}}" alt="アップロード寄せ書きファイル">
                    @endif
                </tr>
            </table>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <form action="{{route('complete')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="title" value="{{$data["title"]}}">
                        <input type="hidden" name="comment" value="{{$data["comment"]}}">
                        <input type="hidden" name="character" value="{{$data["charactersSum"]}}">
                        <input type="hidden" name="year" value="{{$data["yearsSum"]}}">
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="この内容で提出する！">
                        </div>
                    </form>
                </div>
                <br>
                <div class="col-2"></div>
            </div>
        </div>

    </body>
</html>
