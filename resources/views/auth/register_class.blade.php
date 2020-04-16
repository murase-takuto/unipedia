@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-bottom:10px">
                <div class="panel-heading text-center" style="font-size: 16px"><strong>新規登録</strong></div>

                <div class="panel-body">
                    <br>
                    <label for="fuculty" class="col-md-4 control-label">学科を選択してください</label>
                    <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <p>{{ session('error') }}</p>
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            </div>
                        @endif 
                        <div class="col-md-6 col-md-offset-3">
                            @if (session('error'))
                            <p class="alert alert-danger">{{ session('error') }}</p>
                            @endif
                            <form action="{{ route('register') }}" method="GET">
                                <select name="subject_id" class="form-control">
                                    @foreach ($classes as $class => $value)
                                    <option value="{{$class}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary btn-block" type="submit">
                                    次へ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('questions.index') }}">
                    学科が見つからない場合はこちら
                </a>
            </div>
            <br>
            <div class="text-center">
                <a href="{{ route('login') }}">
                    ログインはこちら
                </a>
            </div>
        </div>
    </div>
</div>
@endsection