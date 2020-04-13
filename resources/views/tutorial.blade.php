@extends('layouts.app')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@section('content')
    </head>
    <body>
            <div class="content">
                <div id="sampleCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li style="width:20px; height:20px; background-color:#000" class="active" data-target="#sampleCarousel" data-slide-to="0"></li>
                        <li style="width:20px; height:20px; background-color:#000" data-target="#sampleCarousel" data-slide-to="1"></li>
                        <li style="width:20px; height:20px; background-color:#000" data-target="#sampleCarousel" data-slide-to="2"></li>
                        <li style="width:20px; height:20px; background-color:#000" data-target="#sampleCarousel" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <p style="text-align: center"><img src="{{asset('storage/welcome_img/explain000.jpg')}}" style="max-height: calc(100vh - 250px);" alt="画像を表示できません"></p>
                        </div>
                        <div class="item">
                            <p style="text-align: center"><img src="{{asset('storage/welcome_img/explain001.jpg')}}" style="max-height: calc(100vh - 250px);" alt="画像を表示できません"></p>
                        </div>
                        <div class="item">
                            <p style="text-align: center"><img src="{{asset('storage/welcome_img/explain002.jpg')}}" style="max-height: calc(100vh - 250px);" alt="画像を表示できません"></p>
                        </div>
                        <div class="item">
                            <p style="text-align: center"><img src="{{asset('storage/welcome_img/explain003.jpg')}}" style="max-height: calc(100vh - 250px);" alt="画像を表示できません"></p>
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
            <a href="{{ route('schedules.index') }}" class="btn btn-primary btn-block">時間割に遷移</a>
        </div>
    </body>
</html>
@endsection
