@extends('layout')

@section('contents')
        <nav aria-label="パンくずリスト">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">提出データの入力</li>
                <li class="breadcrumb-item active" aria-current="page">入力内容確認</li>
            </ol>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <p class="lead">以下の内容で提出します。よろしいですか？</p>
                </div>
                <div class="col-2"></div>
            </div>

            <table class="table table-striped">
                <tr><td>タイトル</td><td>{{$data["title"]}}</tr>
                <tr><td>感想</td><td>{{$data["comment"]}}</tr>
                <tr><td>使用キャラ</td><td>{{$data["characters"]}}</tr>
                <tr><td>使用年度</td><td>{{$data["years"]}}</tr>
                <tr><td>作品ファイル</td><td>{{$data["workName"]}}</tr>
                <tr><td>アップロード画像</td><td><img src="/storage/public/temp_works/{{$data["workName"]}}" alt="アップロード作品ファイル"></tr>
                <tr><td>寄せ書きファイル</td><td>{{$data["graffitoName"]}}</tr>
                <tr><td>アップロード画像</td><td>
                    @if($data["graffitoName"]!='データなし')
                        <img src="/storage/public/temp_graffiti/{{$data["graffitoName"]}}" alt="アップロード寄せ書きファイル">
                    @endif
                </tr>
                <tr><td>グッズ化の可否</td><td>{{$data["sellEnabled"]}}</tr>
            </table>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center justify-content-center">
                    <form action="{{route('complete')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="workFileName" value="{{$data["workFileName"]}}">
                        <input type="hidden" name="graffitoFileName" value="{{$data["graffitoFileName"]}}">
                        <input type="hidden" name="title" value="{{$data["title"]}}">
                        <input type="hidden" name="comment" value="{{$data["comment"]}}">
                        <input type="hidden" name="character" value="{{$data["charactersSum"]}}">
                        <input type="hidden" name="year" value="{{$data["yearsSum"]}}">
                        <input type="hidden" name="sellEnabled" value="{{$data["sellEnabledValue"]}}">
                        <div class="text-center mt-4 mb-5">
                            <input type="submit" class="btn btn-primary btn-lg" value="この内容で提出する！">
                        </div>
                    </form>
                </div>
                <br>
                <div class="col-2"></div>
            </div>
        </div>
@endsection
