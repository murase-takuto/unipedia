@extends('layouts.app')
<link href="css/style.css" rel="stylesheet" type="text/css">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table border=1>
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
                            <a href="{{ route('class.show', ['id' => $i]) }}" style="color:black">
                                <span style="font-size:x-small">
                                    {{ $lecture_infos[$i]['name'] }}
                                </span>
                                <br>
                                <span style="font-size:x-small; background-color:white">
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