@extends('layouts.dashboard')
@section('content-header')
    タレント一覧
@endsection
@section('content')

<style>
body {
    color: #404E67;
    background: #F5F7FA;
    font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
    width: 1000px;
    margin: 0px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
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

tr:nth-child(even) {
  background-color: #dddddd;
}


</style>
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <!-- <div>
                    <div class="col-sm-8"><h2>タレント一覧</b></h2></div>    
                </div> -->
                <div class="row">
                <div class="col-3 offset-8">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span onclick="search()" class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input id="text_search" type="text" class="form-control text-center" placeholder="検索">
                    </div>
                </div>
                <div class="col-1 text-center">
                    <i class="fas fa-plus-circle fa-2x"></i>
                </div>
            </div>
                
            </div>
            <table class="table table-bordered">
                <thead>
                
                    <tr>
                        <th>名前</th>
                        <th>アドレス</th>
                        <th>会社入日</th>
                        <th>アクション</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($talents as $talent)
                    <tr>
                        <td>{{ $talent->name }}</td>
                        <td>{{ $talent->email }}</td>
                        <td>{{ $talent->join_company_date }}</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            <a href="{{ route('talent.profile', $talent->id) }}" class="show" title="Show" data-toggle="tooltip" ><i class="material-icons">remove_red_eye</i></a>
                        </td>
                    </tr>
                 @endforeach      
                </tbody>
            </table>
        </div>
    </div>
</div>   
@endsection