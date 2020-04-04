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
            
            <div class="modal fade" id="class-delete-confirm-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            <p class="modal-title">確認</p>
                        </div>
                        <div class="modal-body">
                            本当に授業をコマから外しますか？
                        </div>
                        <div class="modal-footer">
                            <form id="class-delete-form" action="{{ route('class.destroy', [$id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-block" type="submit" value="delete">
                                    外す
                                </button>
                            </form>
                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">キャンセル</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="text-center"><label>授業名</label><p style="font-size: 20px">{{ $lecture->name }}</p></div>
                                </td>
                            </tr>
                            <tr>
                                <td width=50%>
                                    <label>教室</label><p>{{ $lecture->room_number }}</p>
                                </td>
                                <td width=50%>
                                    <label>担当教員</label><p>{{ $lecture->teacher }}</p>
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
                </div>
                <ul class="list-group">
                    @if ($posts->isNotEmpty())
                        @foreach ($posts as $post)
                            <li class="list-group-item">
                                <font size="2" color="#7e8183">
                                    {{ $post->created_at }}  投稿者 {{ $post->user->name }}
                                </font>
                                <br>
                                @if ($post->image_path)
                                    <img src="{{asset('storage/post_board_img/' . $post->image_path)}}">
                                @endif
                                <p style="overflow-wrap: break-word">
                                    {{ $post->body }}
                                </p>
                            </li>
                        @endforeach
                        {{ $posts->links() }}
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
})
</script>
@endsection