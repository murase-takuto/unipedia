@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-success">{{session('error')}}</div>
            @endif
            <input id="lefile" type="file" style="display:none">
            
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align:center;">
                    <label> {{ config('thread.' . $id . '.name') }}のスレッド一覧</label>
                </div>
                <p class="text-center">新しいスレッドはこちらのフォームで作成できます</p>
                <form method="post" action="{{ route('threads.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="hidden" name="type_id" value="{{ $id }}">
                        <input type="text" name="title" class="form-control" placeholder="スレッドのタイトルを入力">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-info">新規スレッドを開く</button>
                        </span>
                    </div>
                </form>
                <div class="list-group">
                    @if ($threads->isNotEmpty())
                        @foreach ($threads as $thread)
                            <a class="list-group-item" href="{{ route('universityposts.show', ['id' => $thread->id]) }}" style="overflow-wrap: break-word">
                                <font size="2" color="#7e8183">
                                    {{ $thread->created_at }}にオープン
                                    閲覧数{{ $thread->count }}回
                                </font>
                                <p>{{ $thread->title }}</p>
                            </a>
                        @endforeach
                    @else
                        <li class="list-group-item">スレッドはまだありません。</li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection