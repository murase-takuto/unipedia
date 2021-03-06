@extends('layouts.app')
<link href="css/style.css" rel="stylesheet" type="text/css">
@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info" style="margin-bottom:10vh">
                <div class="panel-heading" style="text-align: center">
                    <strong style="font-size: 16px">マイページ編集</strong>
                </div>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">×</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">×</span>
                            </button>
                            {{session('error')}}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <ul class="alert alert-danger alert-dismissible fade in" role="alert" style="list-style: none;">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">×</span>
                            </button>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="list-group">
                            <span class="list-group-item" data-toggle="collapse" href="#profile_img">
                                <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                                プロフィール画像
                            </span>
                            <div class="collapse" id="profile_img">
                                <div class="well">
                                    <div class="form-group">
                                        <img id="preview" class="img-responsive" style="width:220px; height:220px; border-radius:50%; object-fit: cover; background-position: center center; margin:20px auto;">
                                        <span class="btn btn-default btn-block" style="width:100%; margin:0 auto">
                                            <label>
                                                <i class="fas fa-camera"></i>
                                                新しいプロフィール画像を選択
                                                <input type="file" name="image" class="form-control" style="display: none" id="putImage">
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span class="list-group-item" data-toggle="collapse" href="#name">
                                <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                                ニックネーム
                            </span>
                            <div class="collapse" id="name">
                                <div class="well">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>
                            <span class="list-group-item" data-toggle="collapse" href="#email">
                                <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                                メールアドレス
                            </span>
                            <div class="collapse" id="email">
                                <div class="well">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            <span class="list-group-item" data-toggle="collapse" href="#newpass">
                                <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                                新しいパスワード
                            </span>
                            <div class="collapse" id="newpass">
                                <div class="well">
                                    <div class="form-group">
                                        新しいパスワード
                                        <input class="form-control" type="password" name="newpass">
                                        新しいパスワード（確認用）
                                        <input class="form-control" type="password" name="newpass_confirmation">
                                    </div>
                                </div>
                            </div>
                            <span class="list-group-item">
                                現在のパスワード<span style="color: red">※必須</span>
                                <div class="form-group" style="margin-bottom: 0px;">
                                    <input class="form-control" type="password" name="oldpass" required>
                                </div>
                            </span>
                            <p class="text-center" style="margin-top: 10px">※変更を完了するには現在のパスワードが必要です。</p>
                            <input type="submit" value="マイページを変更する" class="btn btn-info btn-block" style="margin: 5px 20%">
                        </div>
                    </form>
                </div>
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
