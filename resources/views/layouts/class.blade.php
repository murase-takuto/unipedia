<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Unipedia') }}｜大学生のための情報共有広場</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('storage/page_info_img/favicon.ico') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false" style="border-color: transparent">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('schedules.index') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="btn btn-info" data-toggle="modal" data-target="#class-delete-confirm-modal" style="border-color:transparent">
                                授業をコマから外す
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="btn btn-info" data-toggle="modal" data-target="#class-color-change-modal" style="border-color:transparent">
                                授業のコマの色を変更する
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--コマ削除確認モーダル-->
        <div class="modal fade" id="class-delete-confirm-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        <p class="modal-title">確認</p>
                    </div>
                    <div class="modal-body">
                        本当に授業をコマから外しますか？
                    </div>
                    <form id="class-delete-form" action="{{ route('class.destroy', [$id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-block" type="submit" value="delete">
                            外す
                        </button>
                    </form>
                    <button type="button" class="btn btn-default btn-block" data-dismiss="modal">キャンセル</button>
                </div>
            </div>
        </div>
        <!--色変更モーダル-->
        <div class="modal fade" id="class-color-change-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        <p class="modal-title">時間割表のコマの色を変更できます。</p>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="class-color-change" action="{{ route('schedules.update', [$id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="0" checked><i class="fas fa-circle" style="color:#EEEEEE; font-size: 20px"></i>ホワイト
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="1"><i class="fas fa-circle" style="color:{{ config('colors.1') }}; font-size: 20px"></i>ピンク（必修科目）
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="2"><i class="fas fa-circle" style="color:{{ config('colors.2') }}; font-size: 20px"></i>イエロー（選択科目）
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="3"><i class="fas fa-circle" style="color:{{ config('colors.3') }}; font-size: 20px"></i>オレンジ
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="4"><i class="fas fa-circle" style="color:{{ config('colors.4') }}; font-size: 20px"></i>グリーン
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="5"><i class="fas fa-circle" style="color:{{ config('colors.5') }}; font-size: 20px"></i>ブルー
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="6"><i class="fas fa-circle" style="color:{{ config('colors.6') }}; font-size: 20px"></i>パープル
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" value="update-color">
                                変更する
                            </button>
                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">キャンセル</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <font size="1" color="#7e8183">
            <ul class="nav nav-pills" style="text-align: center">
                <li id="schedule" class="navs" role="presentation" style="width: 24%"><a id="schedule_button" href="{{ route('schedules.index') }}" style="padding:5px 0px"><i class="fas fa-th" style="font-size:24px"></i><p font-size: x-small>時間割</p></a></li>
                <li id="thread" class="navs" role="presentation" style="width: 25%"><a id="thread_button" href="{{ route('threads.index') }}" style="padding:5px 0px"><i class="fas fa-edit" style="font-size:24px"></i><p style="font-size: x-small">みんなの広場</p></a></li>
                <li id="profile" class="navs" role="presentation" style="width: 25%"><a id="profile_button" href="{{ route('profile.index') }}" style="padding:5px 0px"><i class="fas fa-graduation-cap" style="font-size:24px"></i><p style="font-size: x-small">マイページ</p></a></li>
                <li id="question" class="navs" role="presentation" style="width: 24%"><a id="question_button" href="{{ route('questions.index') }}" style="padding:5px 0px"><i class="fas fa-info" style="font-size:24px"></i><p style="font-size: x-small">お問い合わせ</p></a></li>
            </ul>
        </font>
    </nav>
    <script>
        jQuery(function() {
            $('#schedule').on('click', function() {
                $('.navs').removeClass('active');
                $(this).addClass('active');
            });

            $('#thread').on('click', function() {
                $('.navs').removeClass('active');
                $(this).addClass('active');
            });

            $('#profile').on('click', function() {
                $('.navs').removeClass('active');
                $(this).addClass('active');
            });

            $('#question').on('click', function() {
                $('.navs').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
</body>

</html>
