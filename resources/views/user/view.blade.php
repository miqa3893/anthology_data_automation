@extends('layout')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-center justify-content-center">
            <p class="lead">提出されている内容は以下のとおりです。</p>
        </div>
        <div class="col-2"></div>
    </div>

    <table class="table table-striped">
        <tr><td>タイトル</td><td>{{$data["title"]}}</tr>
        <tr><td>感想</td><td>{{$data["comment"]}}</tr>
        <tr><td>使用キャラ</td><td>{{$data["characters"]}}</tr>
        <tr><td>使用年度</td><td>{{$data["years"]}}</tr>
        <tr><td>作品ファイル</td><td>{{$data["workName"]}}</tr>
        <tr><td>アップロード画像</td><td><img src="{{$data["workPath"]}}" alt="アップロード作品ファイル"></tr>
        <tr><td>アップロード画像</td><td>
            @if($data["graffitoPath"]!='データなし')
                <img src="{{$data["graffitoPath"]}}" alt="アップロード寄せ書きファイル">
            @else
                データなし
            @endif
        </tr>
        <tr><td>グッズ化の可否</td><td>{{$data["sellEnabled"]}}</tr>
    </table>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-4 text-center justify-content-center">
            <a class="btn btn-outline-info" href="{{route('users.index')}}">戻る</a>
        </div>
        <div class="col-4 text-center justify-content-center">
            <a class="btn btn-primary" href="{{route('users.update',['user'=>Auth::user()->twitter_id])}}">修正する</a>
        </div>
        <div class="col-2"></div>
    </div>
</div>
