@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <input id="lefile" type="file" style="display:none">
            
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align:center;">
                    <strong style="font-size: 16px">{{ config('thread.' . $id . '.name') }}の広場</strong>
                </div>
                <p class="text-center">自分で広場を作ってみよう！</p>

                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(count($errors) > 0)
                    <ul class="alert alert-danger"　style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                @endif

                <form method="post" action="{{ route('threads.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="hidden" name="type_id" value="{{ $id }}">
                        <input type="text" name="title" class="form-control" placeholder="広場の名前を決めよう！">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-info">広場をひらく</button>
                        </span>
                    </div>
                </form>
                <div class="list-group">
                    @if ($threads->isNotEmpty())
                        @foreach ($threads as $thread)
                            <a class="list-group-item" href="{{ route('universityposts.show', ['id' => $thread->id]) }}" style="overflow-wrap: break-word">
                                <font size="2" color="#7e8183">
                                    {{ $thread->created_at->format('Y年m月d日') }}にオープン
                                    閲覧数{{ $thread->count }}回
                                </font>
                                <p>{{ $thread->title }}</p>
                            </a>
                        @endforeach
                    @else
                        <li class="list-group-item">広場はまだありません。</li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection