@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="font-size: 16px"><strong>新規登録</strong></div>

                <div class="panel-body">
                    <br>
                    <p class="text-center">以下の情報を入力してください</p>
                    <br>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <input  type="hidden" name="pref_id" value="{{ $infos['pref_id'] }}">
                        <input  type="hidden" name="university_id" value="{{ $infos['university_id'] }}">
                        <input  type="hidden" name="fuculty_id" value="{{ $infos['fuculty_id'] }}">
                        <input  type="hidden" name="subject_id" value="{{ $infos['subject_id'] }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ニックネーム</label>
                            <a href="#" data-toggle="tooltip" data-trigger="click" title="登録する名前は本名である必要はありません。" style="color: #636b6f"><i class="fas fa-question-circle"></i></a>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">メールアドレス</label>
                            <a href="#" data-toggle="tooltip" data-trigger="click" title="メールアドレスは大学専用のものである必要はありません。" style="color: #636b6f"><i class="fas fa-question-circle"></i></a>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">パスワード（6文字以上）</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">パスワード確認</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button class="btn btn-primary btn-block" type="submit">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>
@endsection