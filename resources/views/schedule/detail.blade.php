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

            @if(count($errors) > 0)
                <ul class="alert alert-danger"　style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <input id="lefile" type="file" style="display:none">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="text-center">
                        <strong style="font-size: 20px">{{ $lecture->name }}の授業情報共有</strong>
                    </div>
                    <table class="table">
                        <tbody>
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
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $lecture->id }}">
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
                    <p class="text-center" style="margin-top: 4px">みんなで授業情報を共有しよう！</p>
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
                                if (strpos($post->body, 'http') !== false) {
                                    $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                                    $replace = '<a href="$1" target="_blank">$1</a>';
                                    $url = preg_replace($pattern, $replace, $post->body);
                                }
                            @endphp
                            @if ($post->image_path)
                                <a href="{{asset('storage/post_board_img/' . $post->image_path)}}">
                                    <img src="{{asset('storage/post_board_img/' . $post->image_path)}}" class="img-responsive" alt="画像を表示できません">
                                </a>
                            @endif
                            <p style="overflow-wrap: break-word">
                                @if (isset($url))
                                    {!! $url !!}
                                @else
                                    {{ $post->body }}
                                @endif
                            </p>
                            <?php $url = NULL; ?>
                        </li>
                        @endforeach
                        <div class="text-center">
                            {{ $posts->appends(['class_id' => $class])->links() }}
                        </div>
                    @else
                    <li class="list-group-item">この授業についての投稿はまだありません。</li>
                    @endif
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
