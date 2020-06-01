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
                        <form action="{{route('confirm')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            {{ method_field('patch') }}
                            <div class="form-group">
                                <label for="text">作品タイトル</label>
                                <input type="text" name="title" class="form-control @if($errors->has('title')) is-invalid @endif" placeholder="作品のタイトル（64文字以内）" value="{{old('title')}}" aria-describedby="error-message-title">
                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                            </div> <!--タイトルー-->
                            <div class="form-group">
                                <label for="text">感想（200字程度）</label>
                                <textarea name="comment" class="form-control  @if($errors->has('comment')) is-invalid @endif" cols="25" rows="5" aria-describedby="error-message-comment">{{old('comment')}}</textarea>
                                <div class="invalid-feedback">{{ $errors->first('comment') }}</div>
                            </div> <!--感想ー-->
                            <div class="form-group">
                                <label for="checkbox">登場するキャラクター（複数選択可）</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="meiko" name="characters[]" value="1" {{ is_array(old("characters")) && in_array("1", old("characters"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">MEIKO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kaito" name="characters[]" value="2" {{ is_array(old("characters")) && in_array("2", old("characters"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">KAITO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="miku" name="characters[]" value="4"  {{ is_array(old("characters")) && in_array("4", old("characters"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">初音ミク</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="rin" name="characters[]" value="8" {{ is_array(old("characters")) && in_array("8", old("characters"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">鏡音リン</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="len" name="characters[]" value="16" {{ is_array(old("characters")) && in_array("16", old("characters"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">鏡音レン</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="luka" name="characters[]" value="32" {{ is_array(old("characters")) && in_array("32", old("characters"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">巡音ルカ</label>
                                </div>
                                @if($errors->has('characters'))
                                    <div class="text-danger">キャラクターが選択されていません。</div>
                                @endif
                            </div> <!--キャラクター-->
                            <div class="form-group">
                                <label for="checkbox">登場する年度（複数選択可）</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="years[]" id="mm2013" value="1" {{ is_array(old("years")) && in_array("1", old("years"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">2013</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="years[]" id="mm2014" value="2" {{ is_array(old("years")) && in_array("2", old("years"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">2014</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="years[]" id="mm2015" value="4" {{ is_array(old("years")) && in_array("4", old("years"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">2015</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="years[]" id="mm2016" value="8" {{ is_array(old("years")) && in_array("8", old("years"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">2016</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="years[]" id="mm2017" value="16" {{ is_array(old("years")) && in_array("16", old("years"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">2017</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="years[]" id="mm2018" value="32" {{ is_array(old("years")) && in_array("32", old("years"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">2018</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="years[]" id="mm2019" value="64" {{ is_array(old("years")) && in_array("64", old("years"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">2019</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="years[]" id="mm2020s" value="128" {{ is_array(old("years")) && in_array("128", old("years"), true)? 'checked="checked"' : '' }}>
                                    <label class="form-check-label">2020夏</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="years[]" id="mm2020w" value="256" disabled>
                                    <label class="form-check-label">2020冬</label>
                                </div>
                                @if($errors->has('years'))
                                    <div class="text-danger">年度が選択されていません。</div>
                                @endif
                            </div> <!--年度ー-->
                            <div class="form-group">
                                <label for="btn">作品ファイルを選択</label>
                                <div class="input-group">
                                    <label class="input-group-btn">
                                    <span class="btn btn-secondary">
                                        ファイル選択<input type="file" name="work" style="display:none" class="uploadFile" accept=".png,.jpg,.jpeg">
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" readonly="">
                                </div> <!--作品ファイルアップロードー-->
                                @if($errors->has('work'))
                                    <div class="text-danger">{{ $errors->first('work') }}</div>
                                @endif
                            </div> <!--作品ー-->

                            <div id="graffito" class="form-group">
                                <label for="btn">寄せ書きファイルを選択</label>
                                <div class="input-group">
                                    <label class="input-group-btn">
                                    <span class="btn btn-secondary">
                                        ファイル選択<input type="file" name="graffito" style="display:none" class="uploadFile" accept=".png,.jpg,.jpeg">
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" readonly="">
                                </div> <!--寄せ書きファイルアップロードー-->
                                @if($errors->has('graffito'))
                                    <div class="text-danger">{{ $errors->first('graffito') }}</div>
                                @endif
                            </div> <!--寄せ書きー-->
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="送信内容の確認">
                            </div>
                        </form>
                    </div>
                <div class="col-2"></div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            // ファイル名を表示する
            $(document).on('change', ':file', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.parent().parent().next(':text').val(label);
            });
        </script>
    </body>
</html>
