@extends('layout')

@section('contents')
        <nav aria-label="パンくずリスト">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">提出データの修正</li>
                <li class="breadcrumb-item active" aria-current="page">修正完了！</li>
            </ol>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                    <div class="col-8 text-center justify-content-center">
                        <p id="lead_index" class="lead">データが正常に修正されました。</p>
                    </div>
                <div class="col-2"></div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-2"></div>
                <div class="col-4 text-center justify-content-center">
                    <a class="btn btn-outline-info btn-lg" href="{{route('users.index')}}">マイページトップへ</a>
                </div>
                <div class="col-4 text-center justify-content-center">
                    <a class="btn btn-primary btn-lg" href="{{route('users.show',['user'=>Auth::user()->twitter_id])}}">データ確認</a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
@endsection
