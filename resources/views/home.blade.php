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
                <li class="breadcrumb-item active" aria-current="page">提出データの入力</li>
            </ol>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                    <div class="col-8">
                        <p class="lead">提出する作品の情報を入力してください。</p>
                        <br>
                        <form action="/checkout" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="text">作品タイトル</label>
                                <input type="text" id="title" max="64" class="form-control" placeholder="作品のタイトル（64文字以内）">
                            </div> <!--タイトルー-->
                            <div class="form-group">
                                <label for="text">感想（200字程度）</label>
                                <textarea id="comment" class="form-control"></textarea>
                            </div> <!--感想ー-->
                            <div class="form-group">
                                <label for="checkbox">登場するキャラクター（複数選択可）</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="MEIKO" value="1">
                                    <label class="form-check-label">MEIKO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="KAITO" value="2">
                                    <label class="form-check-label">KAITO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="MIKU" value="4">
                                    <label class="form-check-label">初音ミク</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="RIN" value="8">
                                    <label class="form-check-label">鏡音リン</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="LEN" value="16">
                                    <label class="form-check-label">鏡音レン</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="LUKA" value="32">
                                    <label class="form-check-label">巡音ルカ</label>
                                </div>
                            </div> <!--キャラクター-->
                            <div class="form-group">
                                <label for="checkbox">登場する年度（複数選択可）</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mm2013" value="1">
                                    <label class="form-check-label">2013</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mm2014" value="2">
                                    <label class="form-check-label">2014</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mm2015" value="4">
                                    <label class="form-check-label">2015</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mm2016" value="8">
                                    <label class="form-check-label">2016</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mm2017" value="16">
                                    <label class="form-check-label">2017</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mm2018" value="32">
                                    <label class="form-check-label">2018</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mm2019" value="64">
                                    <label class="form-check-label">2019</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mm2020s" value="128">
                                    <label class="form-check-label">2020夏</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mm2020w" value="256" disabled>
                                    <label class="form-check-label">2020冬</label>
                                </div>
                            </div> <!--年度ー-->
                            <div class="form-group">
                                <label for="btn">作品ファイルを選択</label>
                                <div class="input-group">
                                    <label class="input-group-btn">
                                    <span class="btn btn-secondary">
                                        ファイル選択<input type="file" style="display:none" class="uploadFile">
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" readonly="">
                                </div> <!--作品ファイルアップロードー-->
                            </div> <!--作品ー-->
                            <div class="form-group">
                                <label for="btn">寄せ書きファイルを選択</label>
                                <div class="input-group">
                                    <label class="input-group-btn">
                                    <span class="btn btn-secondary">
                                        ファイル選択<input type="file" style="display:none" class="uploadFile">
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" readonly="">
                                </div> <!--作品ファイルアップロードー-->
                            </div> <!--作品ー-->
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="送信内容の確認">
                            </div>
                        </form>
                    </div>
                <div class="col-2"></div>
            </div>
        </div>
    </body>
</html>
