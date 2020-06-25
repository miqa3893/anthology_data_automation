@extends('layout')

@section('contents')
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <p id="lead_index" class="lead">{{$title}}</p>
                    <p>{{$msg}}</p>
                    <img src="{{asset('images/sorry_miku.png')}}" alt="sorry_miku.png">
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row mt-4">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <a href="{{route('users.index')}}" class="btn btn-primary" role="button">ホームに戻る</a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
@endsection
