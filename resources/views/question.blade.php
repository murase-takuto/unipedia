@extends('layouts.app')
<link href="css/style.css" rel="stylesheet" type="text/css">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="text-center">
                <strong style="font-size: 16px">お問い合わせ</strong>
            </h1>
            <span class="text-center">
                <p>Unipediaをご利用いただきありがとうございます。</p>
                <p>お問い合わせはUnipedia公式サイト</p>
                <p>または公式SNSにて受け付けております。</p>
            </span>
            <a class="btn btn-info btn-block" href="https://www.unipedia-official.com" target="_blank">
                Unipedia公式サイト
            </a>
            <div class="btn__container">
                <p>
                    <a href="https://twitter.com/unipedia_info" class="btn-f" target="_blank" style="font-size:18px">
                        <i class="fab fa-twitter"></i>
                        <span>公式Twitter</span>
                    </a>
                </p>
                <p>
                    <a href="https://www.instagram.com/official_unipedia" class="btn" target="_blank" style="font-size:18px">
                        <i class="fab fa-instagram"></i>
                        <span>公式instagram</span>
                    </a>
                </p>
            </div>
            <div class="panel panel-info" style="margin-bottom: 20%">
                <div class="panel-heading">
                    よくある質問
                </div>
                <ul class="list-group">
                    <a class="list-group-item" data-toggle="collapse" href="#question1">
                        <i class="fas fa-question"></i>
                        所属している大学・学部・学科がありません
                    </a>
                    <div class="collapse" id="question1">
                        <div class="well">
                            <i class="far fa-lightbulb"></i>
                            <p>キャンパスの所在地をご確認の上、もう１度お試しください。</p>
                            <p>解決できずお困りの場合は、お手数ですがUnipedia公式サイト、公式Twitter、公式Instagramのいずれかまでお問い合わせください。</p>
                        </div>
                    </div>
                    <a class="list-group-item" data-toggle="collapse" href="#question2">
                        <i class="fas fa-question"></i>
                        専門学生は利用できますか？
                    </a>
                    <div class="collapse" id="question2">
                        <div class="well">
                            <i class="far fa-lightbulb"></i>
                            <p>申し訳ございません。</p>
                            <p>現在は4年制大学のみ対応しております。</p>
                            <p>専門学生からのご要望が多ければ対応してさせていただきます。</p>
                        </div>
                    </div>
                    <a class="list-group-item" data-toggle="collapse" href="#question3">
                        <i class="fas fa-question"></i>
                        使っていたら悪口をみつけました
                    </a>
                    <div class="collapse" id="question3">
                        <div class="well">
                            <i class="far fa-lightbulb"></i>
                            <p>Unipediaはあなたの大学生活を笑顔にするサービスです。</p>
                            <p>すぐにUnipedia公式サイト、公式Twitter、公式Instagramのいずれかまでお問い合わせください。</p>
                        </div>
                    </div>
                </ul>
            </div>
            @guest
                <a class="btn btn-info btn-block" href="{{ route('login') }}">
                    ログイン画面へ
                </a>
                <a class="btn btn-info btn-block" href="{{ route('select.pref') }}" style="margin-bottom:100px">
                    新規登録はこちら
                </a>
            @endguest
        </div>
    </div>
</div>
@endsection