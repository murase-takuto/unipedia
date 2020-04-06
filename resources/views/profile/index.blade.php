@extends('layouts.profile')
<link href="css/style.css" rel="stylesheet" type="text/css">
@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            
            @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            
            @if (count($errors) > 0)
            <ul class="alert alert-danger" style="list-style: none;">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <div class="panel panel-primary" style="margin-bottom:10px">
                <div class="panel-heading" style="text-align: center">
                    <strong>マイページ</strong>
                </div>
                <span class="text-center">
                    <div class="panel-body" style="text-align: center">
                        @if ($user->avatar)
                            <img src="storage/profile_img/{{ $user->avatar }}" class="img-circle" style="width:220px; height:220px; border-radius:50%; background-position: center center; margin:20px auto;">
                        @else
                            <img src="storage/profile_img/default.png" class="img-circle" style="width:220px; height:220px; margin:20px auto;">
                        @endif
                        <br>
                        <label>名前</label>
                        <p>{{ $user->name }}</p>
                        <br>
                        <label>大学</label>
                        <p>{{ config($user->pref_id . '.' . $user->university_id .'.name') }}</p>
                        <br>
                        <label>学部</label>
                        <p>{{ config($user->pref_id . '.' . $user->university_id .'.fuculty.' . $user->fuculty_id) }}</p>
                        <br>
                        <label>学科</label>
                        <p>{{ config($user->pref_id . '.' . $user->university_id .'.class.' . $user->fuculty_id . '.' . $user->fuculty_id) }}</p>
                        <br>
                    </div>
                </span>
            </div>
            <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#logout-confirm-modal" style="width:10%; margin:auto auto 25% auto">
                ログアウト
            </button>
            
            <div class="modal fade" id="logout-confirm-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            <p class="modal-title">確認</p>
                        </div>
                        <div class="modal-body">
                            本当にログアウトしますか？
                        </div>
                        <div class="modal-footer">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-primary btn-block" type="submit" value="logout">
                                    ログアウトする
                                </button>
                            </form>
                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">キャンセル</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection