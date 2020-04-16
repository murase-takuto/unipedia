@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-bottom:10px">
                <div class="panel-heading text-center" style="font-size: 16px"><strong>新規登録</strong></div>

                <div class="panel-body">
                    <br>
                    <label for="pref" class="col-md-4 control-label">大学所在地を選択してください</label>
                    <div class="form-group{{ $errors->has('pref') ? ' has-error' : '' }}">
                        <div class="col-md-6 col-md-offset-3">
                            @if (session('error'))
                                <p class="alert alert-danger">{{ session('error') }}</p>
                            @endif
                            <form action="{{ route('select.university') }}">
                                <select name="pref_id" class="form-control">
                                    @foreach ($prefs as $key => $pref)
                                    <option value="{{$key}}">{{$pref}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary btn-block" type="submit">
                                    大学選択に進む
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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