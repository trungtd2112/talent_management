@extends('layouts.dashboard')
@section('content-header')
    タレント一覧
@endsection
@section('content')

<style>
body {
    /* color: #404E67; */
    /* background: #F5F7FA; */
}
.table-wrapper {
    width: 1000px;
    margin: 0px auto;
    padding: 20px;
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
    /* text-shadow: none; */
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
table.table td {
    min-width: 500px
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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

.w-5 {
    display: none
}


</style>
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                <div class="col-3 offset-8">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span onclick="search()" class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input onkeypress="handleKeyPress(event)" id="text_search" type="text" class="form-control text-center" placeholder="検索">
                    </div>
                </div>
                @if(auth()->user()->role == 0)
                <div class="col-1 text-center">
                    <a href="{{ route('talent.add') }}"><i class="fas fa-plus-circle fa-2x"></i></a>
                </div>
                @endif
            </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead style="background-color: #a0e4fc;">
                        <tr>
                            <th>名前</th>
                            <th>アドレス</th>
                            <th>会社入日</th>
                            @if(auth()->user()->role == 0)
                            <th>アクション</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($talents as $talent)
                            <tr>
                                <td onclick="window.location.href = '{{ route('talent.show', ['talent' => $talent->id,'option' => 'all', 'choose' => 'sukejyu']) }}';" style='cursor: pointer;'>{{ $talent->name }}</td>
                                <td onclick="window.location.href = '{{ route('talent.show', ['talent' => $talent->id,'option' => 'all', 'choose' => 'sukejyu']) }}';" style='cursor: pointer;'>{{ $talent->email }}</td>
                                <td onclick="window.location.href = '{{ route('talent.show', ['talent' => $talent->id,'option' => 'all', 'choose' => 'sukejyu']) }}';" style='cursor: pointer;'>{{ $talent->join_company_date }}</td>
                                @if(auth()->user()->role == 0)
                                <td style="font-size:20px;">
                                    <a style="color: black;" href="{{ route('talent.edit', $talent->id) }}"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('talent.delete', [ 'talentId' => $talent->id]) }}" onclick="return confirm('このタレントを削除してもよろしいですか？');" class="pl-2"><i class="far fa-trash-alt"></i></a>

                                </td>
                                @endif
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                    @if(count($talents) === 0)<span class="d-block text-center p-3 font-weight-bold" style="margin-top: -16px; background-color: #e9ecef;">データが見つかりません</span>@endif
                    <span class="d-flex justify-content-center">
                        {{ $talents->links('pagination::bootstrap-4') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#expandable-table-header-row').ExpandableTable('toggleRow')

        function handleKeyPress(e){
            let key=e.keyCode || e.which;
            if (key === 13){
                search();
            }
        }

        function search(){
            let textSearch = document.getElementById('text_search').value
            window.location.href = 'http://' + window.location.host + '/talent?search=' + (textSearch);
        }
    </script>
@endsection
