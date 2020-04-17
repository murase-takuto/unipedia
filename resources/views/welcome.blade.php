<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Unipedia</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('schedules.index') }}">時間割へ</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>
                        <a href="{{ route('select.pref') }}">新規登録</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <p style="font-size: 15px">大学生のための時間割・情報共有アプリ</p>
                    <p style="font-size: 30px">Unipedia</p>
                </div>
                <!-- モーダル・ダイアログ -->
                <div class="modal fade" id="sampleModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                <strong class="modal-title" style="font-size: 20px">Unipediaでできること</strong>
                            </div>
                            <div class="modal-body">
                                <div id="sampleCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <p><img src="{{asset('storage/welcome_img/explain000.jpg')}}" style="max-height: calc(100vh - 250px);" alt="画像を表示できません"></p>
                                        </div>
                                        <div class="item">
                                            <p><img src="{{asset('storage/welcome_img/explain001.jpg')}}" style="max-height: calc(100vh - 250px);" alt="画像を表示できません"></p>
                                        </div>
                                        <div class="item">
                                            <p><img src="{{asset('storage/welcome_img/explain002.jpg')}}" style="max-height: calc(100vh - 250px);" alt="画像を表示できません"></p>
                                        </div>
                                        <div class="item">
                                            <p><img src="{{asset('storage/welcome_img/explain003.jpg')}}" style="max-height: calc(100vh - 250px);" alt="画像を表示できません"></p>
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#sampleCarousel" role="button" data-slide="prev">
                                        <div style="font-size:40px; position:absolute; top:50%; color:black"><i class="fas fa-angle-double-left fa-pull-left"></i></div>
                                    </a>
                                    <a class="right carousel-control" href="#sampleCarousel" role="button" data-slide="next">
                                        <div style="font-size:40px; position:absolute; top:50%; color:black"><i class="fas fa-angle-double-right fa-pull-right"></i></div>
                                    </a>
                                </div>
                            </div>
                            @guest
                                <div class="modal-footer">
                                    <a href="{{ route('select.pref') }}" class="btn btn-primary btn-block">新規登録はこちら</a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="links">
                    <a href="#" data-toggle="modal" data-target="#sampleModal"><p class="text-capitalize">Unipediaにできること</p></a>
                    <a href="https://www.unipedia-official.com" target="_blank"><p class="text-capitalize">アプリ公式サイト</p></a>
                    <a href="{{ route('questions.index') }}" target="_blank"><p class="text-capitalize">お問い合わせ</p></a>
                    <a href="https://twitter.com/unipedia_info" target="_blank"><p class="text-capitalize">Twitter</p></a>
                    <a href="https://www.instagram.com/official_unipedia" target="_blank"><p class="text-lowercase">instagram</p></a>
                </div>
                <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#sampleModal"><p class="text-capitalize">Unipediaとは？</p></a>
                @guest
                    <a href="{{ route('select.pref') }}" class="btn btn-primary btn-block">新規登録はこちら</a>
                @else
                    <a href="{{ route('schedules.index') }}" class="btn btn-primary btn-block">時間割へ</a>
                @endguest
            </div>
        </div>
    </body>
</html>
