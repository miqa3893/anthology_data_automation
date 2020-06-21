@extends('layout')

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="lead text-center">こんにちは、{{ Auth::user()->twitter_name }}さん！</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-xl-8">
                <div class="card-deck">
                    <a class="card mb-5" href="{{route('submit')}}">
                        <div class="card-header">
                            作品提出
                        </div>
                        <div class="card-body">
                            合同誌に掲載する「作品」を提出できます。
                        </div>
                    </a>
                    <a class="card mb-5">
                        <div class="card-header">
                            提出データ確認・修正（建設中）
                        </div>
                        <div class="card-body">
                            データを提出している方はここから修正できます。<br>
                            再投稿もこちらからどうぞ。
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
