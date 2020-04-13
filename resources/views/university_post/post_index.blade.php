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
            <input id="lefile" type="file" style="display:none">
            
            <div class="panel panel-info">
                <div class="panel-heading">
                    <p style="text-align:center;">
                        <strong style="font-size: 16px">{{ $thread->title }}</strong>
                    </p>
                    <form class="form-horizontal" method="post" action="{{ route('universityposts.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                            <textarea name="body" class="form-control" placeholder="ここにテキストを入力" style="margin:0; border-color:#4285F3; border-bottom:none; border-bottom-left-radius: 0;border-bottom-right-radius: 0;"></textarea>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-info" style="border-radius: 0;">
                                        <i class="fas fa-camera"></i>
                                        <input type="file" name="image" class="form-control" style="display:none;border-top-right-radius:0; border-bottom-right-radius:0;">
                                    </span>
                                </label>
                                <input type="text" class="form-control" placeholder="選択された画像の名前" style="border-radius: 0;" readonly>
                            </div>
                            <input type="submit" class="btn btn-info btn-block" value="投稿する" style="margin:0; width:100%; border-top:none; border-top-left-radius:0; border-top-right-radius:0;"> 
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
        /*$('#putImage').on('change', function (e) {
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
        })*/
        $(document).on('change', ':file', function() {
            var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.parent().parent().next(':text').val(label);
            });
        });
</script>
@endsection
