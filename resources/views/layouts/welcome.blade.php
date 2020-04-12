<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/websaite#">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Unipedia') }}｜大学生のための情報共有広場</title>

    <!--metaタグ-->
    <meta content="全国の大学生必須の時間割・授業情報共有アプリ。このアプリで大学生活がガラッと変わる。簡単登録ですぐに使える！過去問や試験範囲など授業について情報共有はもちろん、サークルなど学生生活の情報発信もこのアプリひとつですべて解決！" name="description">

    <!--OGPタグ-->
    <meta property="og:title" content="大学生のための情報共有広場｜Unipedia" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://unipedia-official.com" />
    <meta property="og:image" content="{{ asset('storage/page_info_img/ogp_img_01.png') }}" />
    <meta property="og:site_name" content="大学生のための情報共有広場｜Unipedia" />
    <meta property="og:description" content="全国の大学生必須の授業情報共有アプリ。このアプリで大学生活がガラッと変わる。過去問や試験範囲、サークルなど学生生活の情報もこのアプリひとつですべて解決！" />
    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('storage/page_info_img/favicon.ico') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>