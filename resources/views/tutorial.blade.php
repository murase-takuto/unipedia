@extends('layouts.app')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <strong style="font-size: 20px">アプリの使い方</strong>
                </div>
                <div class="panel-body text-center">
                    <strong><p style="font-size:16px; margin: 10px 0">＜＜時間割表の作成＞＞</p></strong>
                    <p>まず時間割表を完成させましょう！</p>
                    <p><img src="{{asset('storage/tutorial_img/tutorial01.png')}}"　class="img-responsive" style="max-width: 250px"></p>
                    <p style="font-size: 30px; color:#4E8CF4; margin:20px 0;"><i class="far fa-arrow-alt-circle-down"></i></p>
                    <p>①空白のマスをタッチ！</p>
                    <p><img src="{{asset('storage/tutorial_img/tutorial02.png')}}"　class="img-responsive" style="max-width: 250px"></p>
                    <p style="font-size: 30px; color:#4E8CF4; margin:20px 0;"><i class="far fa-arrow-alt-circle-down"></i></p>
                    <p>授業登録画面に移ります</p>
                    <p><img src="{{asset('storage/tutorial_img/tutorial03.png')}}"　class="img-responsive" style="max-width: 250px"></p>
                    <p style="font-size: 30px; color:#4E8CF4; margin:20px 0;"><i class="far fa-arrow-alt-circle-down"></i></p>
                    <p>②「＋」ボタンをタッチして授業情報</p>
                    <p>（授業名、教室、教員名）</p>
                    <p>を入力しましょう！</p>
                    <p><img src="{{asset('storage/tutorial_img/tutorial04.png')}}"　class="img-responsive" style="max-width: 250px"></p>
                    <p style="font-size: 30px; color:#4E8CF4; margin:20px 0;"><i class="far fa-arrow-alt-circle-down"></i></p>
                    <p><img src="{{asset('storage/tutorial_img/tutorial05.png')}}"　class="img-responsive" style="max-width: 250px"></p>
                    <br>
                    <strong><p>＜重要＞</p></strong>
                    <p>すでに他の人が登録している授業は</p>
                    <button type="button" class='btn btn-primary'>＋選択</button>
                    <p>を押すだけで簡単に登録できます！</p>
                    <p><img src="{{asset('storage/tutorial_img/tutorial06.png')}}"　class="img-responsive" style="max-width: 250px"></p>
                    <p style="font-size: 30px; color:#4E8CF4; margin:20px 0;"><i class="far fa-arrow-alt-circle-down"></i></p>
                    <p>③時間割表が完成！</p>
                    <p>（完成例）</p>
                    <p><img src="{{asset('storage/tutorial_img/tutorial07.png')}}"　class="img-responsive" style="max-width: 250px"></p>
                    <p>登録した授業は</p>
                    <p>情報共有場所に入って</p>
                    <p>授業についての書き込みを</p>
                    <p>自由にできるようになります！</p>
                    <p style="font-size: 30px; color:#4E8CF4; margin:20px 0;"><i class="far fa-arrow-alt-circle-down"></i></p>
                    <p>さっそく登録した授業のコマをタッチ！</p>
                    <p>画像の投稿もできるので</p>
                    <p>どんどん情報をシェアしましょう！</p>
                    <p><img src="{{asset('storage/tutorial_img/tutorial08.png')}}"　class="img-responsive" style="max-width: 250px"></p>
                    <br>
                    <div class="panel-footer" style="background-color: white">
                        <a href="{{ route('schedules.index') }}" class="btn btn-info btn-block" style="width: 80%; margin: 0 auto;">さっそく使ってみる</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection