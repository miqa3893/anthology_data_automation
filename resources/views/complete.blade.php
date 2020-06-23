@extends('layout')

@section('contents')
        <nav aria-label="パンくずリスト">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">提出データの入力</li>
                <li class="breadcrumb-item">入力内容確認</li>
                <li class="breadcrumb-item active" aria-current="page">提出完了！</li>
            </ol>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <p id="lead_index" class="lead">データが正常に提出されました。<br>寄稿頂きありがとうございます！</p>
                    <br>
                    <br>
                    <p id="text_index">質問等は引き続き受け付けておりますので、何かありましたら気軽にお尋ねください。</p>
                    <a href="https://twitter.com/miqa3983/">主催（すーみん）のTwitter</a>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row mt-4">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <a href="{{route('logout')}}" class="btn btn-primary" role="button">ログアウト</a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
@endsection
