@extends('layout')

@section('contents')
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
                    @auth
                        <a href="{{route('users.index')}}" class="btn btn-primary" role="button">マイページトップへ</a>
                    @else
                        <p id="text_index">続行するにはTwitterでログインしてください。</p>
                        <a href="{{route('login')}}" class="btn btn-primary" role="button">Twitter ログイン</a>
                    @endauth
                </div>
                <div class="col-2"></div>
            </div>
        </div>
@endsection
