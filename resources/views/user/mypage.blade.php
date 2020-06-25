@extends('layout')

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col mt-2 mb-2">
                <p class="lead text-center">こんにちは、{{ Auth::user()->twitter_name }}さん！</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-xl-8">
                <div class="card-deck">
                    <a class="card mb-5" href="{{route('submit')}}">
                        <div class="justify-content-center">
                            <img class="card-img-top" src="{{asset('images/submit_miku.png')}}" alt="submit_miku.png">
                        </div>
                        <div class="card-header">
                            作品提出
                        </div>
                        <div class="card-body">
                            合同誌に掲載する「作品」を提出できます。
                        </div>
                    </a>
                    <a class="card mb-5" href="{{route('users.show',['user'=>Auth::user()->twitter_id])}}">
                        <div class="justify-content-center">
{{--                            <img class="card-img-top" src="{{asset('images/submit_miku.png')}}" alt="submit_miku.png">--}}
                            <img class="card-img-top" src="https://placehold.jp/3d4070/ffffff/454x340.png?text=fix_miku.png" alt="submit_miku.png">
                        </div>
                        <div class="card-header">
                            データ確認・修正
                        </div>
                        <div class="card-body">
                            提出データの確認や修正、再投稿ができます。
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
