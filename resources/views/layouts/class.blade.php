<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
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
                        <p class="text-center">以下の中から好きな色を選んでください。</p>
                        <form class="form-horizontal" id="class-color-change" action="{{ route('schedules.update', [$id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="0" checked><span style="color:{{ config('colors.0') }};text-stroke:1px #000">ホワイト</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="1"><span style="color:{{ config('colors.1') }};">ピンク（必修科目）</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="2"><span style="color:{{ config('colors.2') }};">イエロー（選択科目）</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="3"><span style="color:{{ config('colors.3') }};">オレンジ</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="4"><span style="color:{{ config('colors.4') }};">グリーン</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="5"><span style="color:{{ config('colors.5') }};">ブルー</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="color" value="6"><span style="color:{{ config('colors.6') }};">パープル</span>
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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
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