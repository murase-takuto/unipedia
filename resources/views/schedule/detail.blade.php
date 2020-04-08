@extends('layouts.class')

@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
            
            @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <input id="lefile" type="file" style="display:none">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="text-center">
                                        <strong style="font-size: 20px">{{ $lecture->name }}の授業情報共有</strong>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <label>教室</label>
                                        <p>{{ $lecture->room_number }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <label>担当教員</label>
                                        <p>{{ $lecture->teacher }}</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="post" action="{{ route('class.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="hidden" name="class_id" value="{{ $id }}">
                            <input type="text" name="body" class="form-control" placeholder="ここにテキストを入力">
                            <span class="input-group-btn">
                                <img id="preview" style="width:35px;height:35px;">
                                <label>
                                    <span class="btn btn-info">
                                        <i class="fas fa-camera"></i>
                                        <input type="file" name="image" class="form-control" style="display:none" id="putImage">
                                    </span>
                                </label>
                                <input type="submit" class="btn btn-info" value="投稿する">
                            </span>
                        </div>
                    </form>
                    <p class="text-center">みんなで授業情報を共有しよう！</p>
                </div>
                <ul class="list-group posts">
                    @if ($posts->isNotEmpty())
                        @foreach ($posts as $post)
                        <li class="list-group-item">
                            <font size="2" color="#7e8183">
                                {{ $post->created_at->format('Y年m月d日') }} 投稿者 {{ $post->user->name }}
                            </font>
                            <br>
                            @php
                                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                                $replace = '<a href="$1" target="_blank">$1</a>';
                                $body = preg_replace($pattern, $replace, $post->body);
                            @endphp
                            @if ($post->image_path)
                                <img src="{{asset('storage/post_board_img/' . $post->image_path)}}" class="img-responsive" alt="サンプル画像">
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
                    @else
                    <li class="list-group-item">この授業についての投稿はまだありません。</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(function() {
        $('#putImage').on('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            if (file.type.indexOf("image") < 0) {
                alert("画像ファイルを指定してください。");
                return false;
            }
            reader.onload = function(e) {
                $("#preview").attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        })
    })
</script>
@endsection