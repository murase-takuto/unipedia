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
                    <th bgcolor="#E4E5E9" width="10%"></th>
                    <th bgcolor="#FFFF9F" width="15%">月</th>
                    <th bgcolor="#F9B1D7" width="15%">火</th>
                    <th bgcolor="#A2CBE1" width="15%">水</th>
                    <th bgcolor="#CCDE87" width="15%">木</th>
                    <th bgcolor="#FCC8B2" width="15%">金</th>
                    <th bgcolor="#DFBEDD" width="15%">土</th>
                </tr>
                @php
                    $j = 1;
                @endphp
                <!-- 以下の部分は改善の余地あり -->
                @for ($i = 1; $i <= 36; $i++)
                    @if ($i % 6 == 1)
                        <tr><td bgcolor="#E4E5E9" width="4%">{{ $j++ }}</td>
                    @endif
                    @php
                        $color_id = 'color_' . $i;
                    @endphp
                    <td width="16%">
                        @if ($lecture_infos[$i] == null)
                            <a href="{{ route('schedules.create', ['id' => $i]) }}" style="color:black">{{ '-' }}</a>
                        @else
                            <font size="1">
                                <p>{{ $lecture_infos[$i]['name'] }}</p>
                                <a href="{{ route('class.show', ['id' => $i]) }}" style="color:black; background-color:{{ config('colors.' . $infos->$color_id) }}">
                                    <span style="position:relative">
                                        <span style="font-weight: bold">
                                            {{ $lecture_infos[$i]['name'] }}
                                        </span>
                                        <br>
                                        {{ $lecture_infos[$i]['room_number'] }}
                                    </span>
                                </a>
                            </font>
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