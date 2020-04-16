<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Unipedia') }}｜大学生のための情報共有広場</title>

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
                            <a class="btn btn-info" href="{{ route('profile.create') }}" style="border-color:transparent">
                                プロフィールの情報を編集する
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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