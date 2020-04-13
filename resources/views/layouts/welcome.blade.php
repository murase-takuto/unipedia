@extends('layouts.welcome')
@section('content')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title>{{ config('app.name', 'Unipedia') }}｜大学生のための情報共有広場</title>
=======
    <title>{{ config('app.name', 'Laravel') }}｜大学生のための情報共有広場</title>
>>>>>>> 8745cc6... [update] welcomeページの修正

    <!--metaタグ-->
    <meta content="全国の大学生必須の時間割・授業情報共有アプリ。このアプリで大学生活がガラッと変わる。簡単登録ですぐに使える！過去問や試験範囲など授業について情報共有はもちろん、サークルなど学生生活の情報発信もこのアプリひとつですべて解決！" name="description">

    <!--OGPタグ-->
    <meta property="og:title" content="大学生のための情報共有広場｜Unipedia" />
    <meta property="og:type" content="ページの種類" />
    <meta property="og:url" content="ページの URL" />
    <meta property="og:image" content="サムネイル画像の URL" />
    <meta property="og:site_name" content="サイト名" />
    <meta property="og:description" content="ページのディスクリプション" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

<<<<<<< HEAD
    <script src="{{ asset('js/app.js') }}"></script>
=======
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
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
>>>>>>> 8745cc6... [update] welcomeページの修正
</body>

</html>