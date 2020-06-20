@extends('layout')

@section('contents')
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <p id="lead_index" class="lead">{{$msg}}<br>システム管理者までご連絡ください。</p>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <a href="{{route('index')}}" class="btn btn-primary" role="button">ホームに戻る</a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
@endsection
