@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-success">{{ session('error') }}</div>
            @endif

            @if(count($errors) > 0)
                <ul class="alert alert-danger"　style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <input id="lefile" type="file" style="display:none">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p style="text-align:center;">
                        <strong style="font-size: 16px">{{ $thread->title }}</strong>
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
                                        <input type="file" name="image" id="putImage" class="form-control" style="display:none">
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
                            @php
                                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                                $replace = '<a href="$1" target="_blank">$1</a>';
                                $body = preg_replace($pattern, $replace, $post->body);
                            @endphp
                            @if ($post->image_path)
                                <a href="{{asset('storage/post_board_img/' . $post->image_path)}}">
                                    <img src="{{asset('storage/post_board_img/' . $post->image_path)}}" class="img-responsive" alt="画像を表示できません">
                                </a>
                            @else 
                                <p style="overflow-wrap: break-word">
                                    {!! $body !!}
                                </p>
                            @endif
                        </li>
                    @endforeach
                    <div class="text-center">
                        {{ $posts->links() }}
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
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
    })
</script>
@endsection
