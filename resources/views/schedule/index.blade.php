@extends('layouts.app')
<link href="css/style.css" rel="stylesheet" type="text/css">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ session('status') }}
                </div>
            @endif
            <div class="alert alert-warning" style="margin-bottom: 8px;">
                <a href="{{ route('threads.show', ['id' => 5]) }}">
                    【新入生向け】履修相談はこちら！
                </a>
            </div>
            <table border=1 style="margin-bottom: 15vh">
                <tr>
                    <th bgcolor="#E4E5E9" width="4%"></th>
                    <th bgcolor="#E4E5E9" width="16%">月</th>
                    <th bgcolor="#E4E5E9" width="16%">火</th>
                    <th bgcolor="#E4E5E9" width="16%">水</th>
                    <th bgcolor="#E4E5E9" width="16%">木</th>
                    <th bgcolor="#E4E5E9" width="16%">金</th>
                    <th bgcolor="#E4E5E9" width="16%">土</th>
                </tr>
                @php
                    $j = 1;
                @endphp
                <!-- 以下の部分は改善の余地あり -->
                @for ($i = 1; $i <= 36; $i++)
                    @if ($i % 6 == 1)
                        <tr><td bgcolor="#E4E5E9" width="2%" style="font-size: x-small">{{ $j++ }}</td>
                    @endif
                    @php
                        $color_id = 'color_' . $i;
                    @endphp
                    <td width="auto" height="16%" bgcolor="{{ config('colors.' . $infos->$color_id) }}">
                        @if ($lecture_infos[$i] == null)
                            <a href="{{ route('schedules.create', ['id' => $i]) }}" style="color:black">{{ '-' }}</a>
                        @else
                            <a href="{{ route('class.show', ['id' => $i, 'class_id' => $lecture_infos[$i]['id']]) }}" style="color:black; font-size:x-small;">
                                <span style="font-weight:600">
                                    {{ $lecture_infos[$i]['name'] }}
                                </span>
                                <br>
                                <span>
                                    {{ $lecture_infos[$i]['room_number'] }}
                                </span>
                            </a>
                        @endif
                    </td>
                    @if ($i % 6 == 0)
                        </tr>
                    @endif
                @endfor
            </table>
        </div>
    </div>
</div>
@endsection