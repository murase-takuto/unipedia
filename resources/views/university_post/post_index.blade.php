@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-success">{{session('error')}}</div>
            @endif
            <input id="lefile" type="file" style="display:none">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p style="text-align:center;">
                        <label>{{ $thread->title }}</label>
                    </p>
                    <form method="post" action="{{ route('universityposts.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                            <input type="text" name="body" class="form-control" placeholder="ここにテキストを入力">
                            <span class="input-group-btn">
                                <img id="preview" style="width:35px;height:35px;">
                                <label>
                                    <span class="btn btn-info">
                                        <i class="fas fa-camera"></i>
                                        <input type="file" name="image" class="form-control" style="display:none">
                                    </span>
                                </label>
                                <input type="submit" class="btn btn-info" value="投稿する">
                            </span>
                        </div>
                    </form>
                </div>
                <ul class="list-group posts">
                    @foreach ($posts as $post)
                        <li class="list-group-item">
                            <font size="2" color="#7e8183">
                                {{ $post->created_at }}
                            </font>
                            <br>
                            @if ($post->image_path)
                                <img src="{{asset('storage/post_board_img/' . $post->image_path)}}" class="img-responsive" alt="サンプル画像">
                            @else 
                                <p style="overflow-wrap: break-word">
                                    {{ $post->body }}
                                </p>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(function () {
    $('#putImage').on('change', function (e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        if(file.type.indexOf("image") < 0){
            alert("画像ファイルを指定してください。");
            return false;
        }
        reader.onload = function (e) {
            $("#preview").attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    })
    
    $(function() {
        var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;

        $('.posts').html($('.posts').html().replace(exp, "<a href='$1'>$1</a>"));
    })
})
</script>
@endsection