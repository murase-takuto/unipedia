@extends('layouts.app')

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
                    @if ($exist_check->isNotEmpty())
                    <div style="float: right;">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"  style="border-color:transparent; padding:0">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu" style="position: relative">
                            <li role="presentation"><a class="btn btn-info" data-toggle="modal" data-target="#class-delete-confirm-modal" style="border-color:transparent">
                                授業をコマから外す
                            </a></li>
                        </ul>
                    </div>
                    </div>
                    @endif
                    <p style="text-align:center;">
                        <label>
                            {{ config('time.' . $id) }}・{{ $lecture->name }}の掲示板
                        </label>
                    </p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <label>授業名</label><p>{{ $lecture->name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>教室</label><p>{{ $lecture->room_number }}</p>
                                </td>
                                <td>
                                    <label>担当教員</label><p>{{ $lecture->teacher }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form method="post" action="{{ route('class.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="hidden" name="class_id" value="{{ $id }}">
                        <div class="row">
                            <div class="col-sm-2">
                                <img id="preview" style="width:110px;height:110px;">
                            </div> 
                            <div class="col-sm-10">
                                <input type="text" name="body" class="form-control" style="height:110px;" placeholder="{{ $errors->has('body') ? $errors->first('body') : 'ここにテキストを入力' }}">
                            </div>
                        </div>
                        <div class="input-group-btn row">
                            <span class="btn btn-info" class="col-sm-12" style="height:55px;padding-top:5px;">
                                <label>
                                    <p style="padding-top:8px">画像を選択する</p>
                                    <input type="file" name="image" class="form-control" style="display:none" id="putImage">
                                </label>
                            </span>
                            <span>    
                                <input type="submit" class="btn btn-info col-sm-12" value="投稿する" style="height:55px;">
                            </span>
                        </div>
                    </div>
                </form>
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
<nav class="navbar navbar-default navbar-fixed-bottom">
    <font size="1" color="#7e8183">
        <ul class="nav nav-pills" style="text-align: center">
            <li role="presentation" style="width: 24%"><a href="#">マイページ</a></li>
            <li role="presentation" style="width: 25%" class="active"><a href="{{ route('schedules.index') }}">時間割</a></li>
            <li role="presentation" style="width: 25%"><a href="#">大学掲示板</a></li>
            <li role="presentation" style="width: 24%"><a href="#">お知らせ</a></li>
        </ul>
    </font>
</nav>
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