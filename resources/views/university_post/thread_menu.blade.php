@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <input id="lefile" type="file" style="display:none">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align:center">
                    <strong style="font-size: 16px">{{ config($pref_id . '.' . $university_id .'.name') }}の情報共有ページ</strong>
                </div>
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="list-group" style="text-align:center;">
                            <a class="list-group-item" href="{{ route('threads.show', ['id' => $i]) }}">
                                <p class="list-group-item-heading" style="font-size:16px">{{ config('thread.' . $i . '.name') }}</p>
                                <p style="font-size:11px">{{ config('thread.' . $i . '.detail') }}</p>
                            </a>
                        </div>
                    @endfor
                    <div class="list-group" style="text-align:center;">
                        <a class="list-group-item list-group-item-warning" href="{{ route('threads.show', ['id' => 5]) }}">
                            <p class="list-group-item-heading" style="font-size:16px">{{ config('thread.' . 5 . '.name') }}</p>
                            <p style="font-size:11px">{{ config('thread.' . 5 . '.detail') }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection