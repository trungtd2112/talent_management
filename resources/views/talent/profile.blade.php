
@extends('layouts.dashboard')
@section('content-header')
    プロフィール
@endsection
@section('content')
<style>
/* body {
    color: #404E67;
    background: #F5F7FA;
    font-family: 'Open Sans', sans-serif;
} */
.table-wrapper {
    width: 100%;
    margin: 0px auto;
    background: #fff;
    padding: 10px;
    /* box-shadow: 0 1px 1px rgba(0,0,0,.05); */
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 150px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.show {
    color: 'gray';
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}

table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}

/* .btn {
    padding: 1px 5px 1px 5px;
    font-size: 10px;
    margin-left: 10px;
    border-width: thin;
    border-color: black;
} */
.container-lg {
    /* background: #fff; */
}
.table-text{
    color: black;
    font-size: 13px;
    min-height: 30px;
    min-width: 100px;

}
.col-md-6 {
    margin-top: 6px;
}
.radiobutton {

}
#nam, #nu {
    margin-top: 7px;
    margin-left: 10px;

}
#nu {
    margin-left: 20px
}
.radiostyle {
    margin-top: 7px
}
.col-md-6 {
    margin-left: 40px
}
</style>
@php
    $choose = explode('/', Request::url())[6];
@endphp
<div class="container-lg">
    <div class="table-responsive">
    <div class="table-wrapper">
            @if(auth()->user()->role == 0)
            <div style="margin-left: 900px;" class="form-group row">
              <a style="color: black" href="{{ route('talent.edit', $talent->id) }}" ><i class="far fa-edit"></i></a>
                <div style="margin-left: 10px">編集</div>
                <!-- <a href="{{ route('talent.edit', $talent->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> -->
            </div>
            @endif
           <div class="card-body" @if(auth()->user()->role == 0) style="margin-top: -60px" @endif>
               @if(auth()->user()->role == 0)<a style="color: black" href="{{ url()->previous() }}"><i class="fa fa-arrow-left" style="font-size:24px;"></i></a>@endif
                        <div class="form-group row">
                            <div class="col-md-6" >
                            <img src="{{ asset($talent->avatar) }}" alt="" style="height: 60px ;width: 80px;border-radius: 20px; margin-left: 250px"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-6" >
                                    {{ $talent->name }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                            <div class="col-md-6">
                                {{ $talent->email }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">性</label>
                            <div class="col-md-6 radiostyle row">
                                <input type="radio" id="nam" name="fav_language" value="男" @if($talent->gender == 1) checked @else disabled @endif >
                                <label for="css" style="margin-left: 7px">男</label><br>
                                <input type="radio" id="nu" name="fav_language" value="女" @if($talent->gender == 2) checked @else disabled @endif>
                                 <label for="css" style="margin-left: 7px">女</label><br>
                                <input type="radio" id="nu" name="fav_language" value="他" @if($talent->gender == 0) checked @else disabled @endif>
                                <label for="css" style="margin-left: 7px">他</label><br>
                             </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">詳細の情報</label>
                            <div class="col-md-6">
                                <ul style="margin-left: -25px">
                                @foreach ($infos as $info)
                                    @if (empty($info))
                                    @else
                                        <li>{{ $info }}</li>
                                    @endif
                                @endforeach

                                </ul>
                            </div>
                        </div>

                </div>


            <div class="table-title">
                <a href="{{ route('talent.show', ['talent' => $talent->id,'option' => 'all', 'choose' => 'sukejyu'])}}" class="table-text" style="color: black"><p class="badge p-2 badge" style="font-size: 18px; border: 1px solid gray; background-color: @if(str_contains(request()->path(), 'sukejyu')) #007bff @else white @endif "　>スケジュール</p></a>
                <a href="{{ route('talent.show', ['talent' => $talent->id,'option' => 'all','choose' => 'kosu'])}}" class="table-text" style="color: black"><p class="badge p-2 badge" style="font-size: 18px; border: 1px solid gray; background-color: @if(str_contains(request()->path(), 'kosu')) #007bff @else white @endif ">コース</p></a>

            </div>
            @if($choose == 'sukejyu')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 mb-4">
                        <a href="{{ route('talent.show', ['talent' => $talent->id,'option' => 'all', 'choose' => 'sukejyu'])}}" class="btn btn-default">全て</a>
                        <a href="{{route('talent.show', ['talent' => $talent->id,'option' => 'not-started', 'choose' => 'sukejyu'] )}}" class="btn text-white btn-success ml-2">未着手</a>
                        <a href="{{route('talent.show', ['talent' => $talent->id,'option' => 'processing', 'choose' => 'sukejyu'])}}" class="btn btn-warning ml-2">進行中</a>
                        <a href="{{route('talent.show', ['talent' => $talent->id,'option' => 'done', 'choose' => 'sukejyu'])}}" class="btn text-white btn-info ml-2">完了</a>
                        <a href="{{route('talent.show', ['talent' => $talent->id,'option' => 'interrupted', 'choose' => 'sukejyu'])}}" class="btn text-white btn-danger ml-2">中断</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead style="background-color: #a0e4fc;">
                    <tr>
                        <th>スケジュール名</th>
                        <th>開始日</th>
                        <th style="width: 18%">時間</th>
                        <th>場所</th>
                        <th>ステータス</th>
                        <th style="width: 35%">詳細の情報</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $option = explode('/', Request::url())[5];
                @endphp
                @foreach ($results as $result)
                    @if($result->status == 0 && $option == 'not-started')
                        <tr>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->schedule_name}}</td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->date}}</td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->start_time}} - {{ $result->end_time}}</td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->location}}</td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">
                                <p class="badge p-2 badge-success">未着手</p>
                            </td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->information }}</td>
                        </tr>
                    @elseif($result->status == 1 && $option == 'processing')

                    <tr>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->schedule_name}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->date}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->start_time}} - {{ $result->end_time}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->location}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">
                            <p class="badge p-2 badge-warning">進行中</p>
                        </td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->information }}</td>
                    </tr>
                    @elseif($result->status == 2 && $option == 'done')

                        <tr>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->schedule_name}}</td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->date}}</td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';" >{{ $result->start_time}} - {{ $result->end_time}}</td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->location}}</td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">
                            <p class="badge px-3 py-2 badge-info">完了</p>
                            </td>
                            <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->information }}</td>
                        </tr>
                    @elseif($result->status == 3 && $option == 'interrupted')

                    <tr>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->schedule_name}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->date}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->start_time}} - {{ $result->end_time}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->location}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">
                        <p class="badge px-3 py-2 badge-danger">中断</p>
                        </td>
                        <td>{{ $result->information }}</td>
                    </tr>
                    @elseif($option == 'all')
                    <tr>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->schedule_name}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->date}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->start_time}} - {{ $result->end_time}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">{{ $result->location}}</td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">
                        @switch($result->status)
                            @case(0)
                            <p class="badge p-2 badge-success">未着手</p>
                            @break
                            @case(1)
                            <p class="badge p-2 badge-warning">進行中</p>
                            @break
                            @case(2)
                            <p class="badge px-3 py-2 badge-info">完了</p>
                            @break
                            @case(3)
                            <p class="badge px-3 py-2 badge-danger">中断</p>
                            @break
                        @endswitch
                        </td>
                        <td onclick="window.location.href = '{{route('schedule.show', ['scheduleId' => $result->id])}}';">
                            {{$result->information}}
                        </td>
                    </tr>
                    @endif
                @endforeach
                    </tbody>
                </table>
                @if(count($results) === 0)<span class="d-block text-center p-3 font-weight-bold" style="margin-top: -16px; background-color: #e9ecef;color: red">データが見つかりません</span>@endif
            </div>



            @elseif($choose == 'kosu')
                <div class="container-fluid">
                <div class="row">
                    <div class="col-6 mb-4">
                        <a href="{{ route('talent.show', ['talent' => $talent->id,'option' => 'all', 'choose' => 'kosu'])}}" class="btn btn-default">全て</a>
                        <a href="{{route('talent.show', ['talent' => $talent->id,'option' => 'not-started', 'choose' => 'kosu'] )}}" class="btn text-white btn-success ml-2">未着手</a>
                        <a href="{{route('talent.show', ['talent' => $talent->id,'option' => 'processing', 'choose' => 'kosu'])}}" class="btn btn-warning ml-2">進行中</a>
                        <a href="{{route('talent.show', ['talent' => $talent->id,'option' => 'done', 'choose' => 'kosu'])}}" class="btn text-white btn-info ml-2">完了</a>
                        <a href="{{route('talent.show', ['talent' => $talent->id,'option' => 'interrupted', 'choose' => 'kosu'])}}" class="btn text-white btn-danger ml-2">中断</a>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-12">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead style="background-color: #a0e4fc;">
                    <tr>
                        <th>コース名</th>
                        <th>開始日</th>
                        <th>終了日</th>
                        <th>時間</th>
                        <th>場所</th>
                        <th>ステータス</th>
                        <th>成績</th>
                        <th style="width: 35%">コメント</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $option = explode('/', Request::url())[5];
                @endphp
                @foreach ($kosus as $kosu)
                    @if($kosu->status == 0 && $option == 'not-started')
                        <tr>
                            <td>{{$kosu->name}}</td>
                            <td>{{ $kosu->start_date }}</td>
                            <td>{{ $kosu->end_date }}</td>
                            <td>{{ $kosu->start_time}} - {{ $kosu->end_time}}</td>
                            <td>{{ $kosu->location }} </td>
                            <td>
                                <p class="badge p-2 badge-success">未着手</p>
                            </td>
                            @foreach($kosu->users as $talent)

                            @if($talent->pivot->user_id === $id)
                            <td>{{$talent->pivot->score}}/{{$kosu->max_score}}</td>
                            <td>{{$talent->pivot->comment}}</td>
                            @endif

                         @endforeach
                        </tr>
                    @elseif($kosu->status == 1 && $option == 'processing')

                    <tr>
                            <td>{{$kosu->name}}</td>
                            <td>{{ $kosu->start_date }}</td>
                            <td>{{ $kosu->end_date }}</td>
                            <td>{{ $kosu->start_time}} - {{ $kosu->end_time}}</td>
                            <td>{{ $kosu->location }} </td>
                        <td>
                            <p class="badge p-2 badge-warning">進行中</p>
                        </td>
                        @foreach($kosu->users as $talent)

                        @if($talent->pivot->user_id === $id)
                            <td>{{$talent->pivot->score}}/{{$kosu->max_score}}</td>
                            <td>{{$talent->pivot->comment}}</td>
                            @endif

                         @endforeach
                    </tr>
                    @elseif($kosu->status == 2 && $option == 'done')

                        <tr>
                            <td>{{$kosu->name}}</td>
                            <td>{{ $kosu->start_date }}</td>
                            <td>{{ $kosu->end_date }}</td>
                            <td>{{ $kosu->start_time}} - {{ $kosu->end_time}}</td>
                            <td>{{ $kosu->location }} </td>
                            <td>
                            <p class="badge px-3 py-2 badge-info">完了</p>
                            </td>
                            @foreach($kosu->users as $talent)

                            @if($talent->pivot->user_id === $id)
                            <td>{{$talent->pivot->score}}/{{$kosu->max_score}}</td>
                            <td>{{$talent->pivot->comment}}</td>
                            @endif

                         @endforeach
                        </tr>
                    @elseif($kosu->status == 3 && $option == 'interrupted')

                    <tr>
                        <td>{{$kosu->name}}</td>
                            <td>{{ $kosu->start_date }}</td>
                            <td>{{ $kosu->end_date }}</td>
                            <td>{{ $kosu->start_time}} - {{ $kosu->end_time}}</td>
                            <td>{{ $kosu->location }} </td>
                        <td>
                        <p class="badge px-3 py-2 badge-danger">中断</p>
                        </td>
                        @foreach($kosu->users as $talent)

                        @if($talent->pivot->user_id === $id)
                            <td>{{$talent->pivot->score}}/{{$kosu->max_score}}</td>
                            <td>{{$talent->pivot->comment}}</td>
                            @endif

                         @endforeach
                    </tr>
                    @elseif($option == 'all')
                    <tr>
                        <td>{{$kosu->name}}</td>
                            <td>{{ $kosu->start_date }}</td>
                            <td>{{ $kosu->end_date }}</td>
                            <td>{{ $kosu->start_time}} - {{ $kosu->end_time}}</td>
                            <td>{{ $kosu->location }} </td>
                        <td>
                        @switch($kosu->status)
                            @case(0)
                            <p class="badge p-2 badge-success">未着手</p>
                            @break
                            @case(1)
                            <p class="badge p-2 badge-warning">進行中</p>
                            @break
                            @case(2)
                            <p class="badge px-3 py-2 badge-info">完了</p>
                            @break
                            @case(3)
                            <p class="badge px-3 py-2 badge-danger">中断</p>
                            @break
                        @endswitch
                        </td>
                        @foreach($kosu->users as $talent)
                            @if($talent->pivot->user_id === $id)
                            <td>{{$talent->pivot->score}}/{{$kosu->max_score}}</td>
                            <td>{{$talent->pivot->comment}}</td>
                            @endif

                         @endforeach

                    </tr>
                    @endif
                @endforeach
                    </tbody>
                </table>
                @if(count($kosus) === 0)<span class="d-block text-center p-3 font-weight-bold" style="margin-top: -16px; background-color: #e9ecef;color: red">データが見つかりません</span>@endif
                </div>
            @endif



        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
