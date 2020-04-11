<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}｜大学生のための情報共有広場</title>

    <!--metaタグ-->
    <meta content="全国の大学生必須の時間割・授業情報共有アプリ。このアプリで大学生活がガラッと変わる。簡単登録ですぐに使える！過去問や試験範囲など授業について情報共有はもちろん、サークルなど学生生活の情報発信もこのアプリひとつですべて解決！" name="description">

    <!--OGPタグ-->
    <meta property="og:title" content="大学生のための情報共有広場｜Unipedia" />
    <meta property="og:type" content="ページの種類" />
    <meta property="og:url" content="https://unipedia-official.com/login" />
    <meta property="og:image" content="サムネイル画像の URL" />
    <meta property="og:site_name" content="Unipedia" />
    <meta property="og:description" content="全国の大学生必須の時間割・授業情報共有アプリ。このアプリで大学生活がガラッと変わる。簡単登録ですぐに使える！過去問や試験範囲など授業について情報共有はもちろん、サークルなど学生生活の情報発信もこのアプリひとつですべて解決" />

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
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('schedules.index') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <font size="1" color="#7e8183">
            <ul class="nav nav-pills" style="text-align: center">
                <li id="schedule" class="navs" role="presentation" style="width: 24%"><a id="schedule_button" href="{{ route('schedules.index') }}"><i class="fas fa-th" style="font-size:24px"></i><p font-size: x-small>時間割</p></a></li>
                <li id="thread" class="navs" role="presentation" style="width: 25%"><a id="thread_button" href="{{ route('threads.index') }}"><i class="fas fa-edit" style="font-size:24px"></i><p style="font-size: x-small">みんなの広場</p></a></li>
                <li id="profile" class="navs" role="presentation" style="width: 25%"><a id="profile_button" href="{{ route('profile.index') }}"><i class="fas fa-graduation-cap" style="font-size:24px"></i><p style="font-size: x-small">マイページ</p></a></li>
                <li id="question" class="navs" role="presentation" style="width: 24%"><a id="question_button" href="{{ route('questions.index') }}"><i class="fas fa-info" style="font-size:24px"></i><p style="font-size: x-small">お問い合わせ</p></a></li>
            </ul>
        </font>
    </nav>

    <script>
        jQuery(function() {
            $('#schedule').on('click', function(){
                $('.navs').removeClass('active');
                $(this).addClass('active');
            });

            $('#thread').on('click', function(){
                $('.navs').removeClass('active');
                $(this).addClass('active');
            });

            $('#profile').on('click', function(){
                $('.navs').removeClass('active');
                $(this).addClass('active');
            });

            $('#question').on('click', function(){
                $('.navs').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
</body>

</html>
