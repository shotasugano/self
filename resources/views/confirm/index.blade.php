@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>変更申請商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">編集申請商品一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Citems as $Citem)
                                <tr>
                                    <td>{{ $Citem->item_id }}</td>
                                    <td>{{ $Citem->name }}</td>
                                    <td>{{ $Citem->type }}</td>
                                    <td>{{ $Citem->detail }}</td>
                                    <td><a href="confirms/editmove/{{$Citem->id}}">>>詳細確認</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">削除申請商品一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Ditems as $Ditem)
                                <tr>
                                    <td>{{ $Ditem->IID }}</td>
                                    <td>{{ $Ditem->INAME }}</td>
                                    <td>{{ $Ditem->ITYPE }}</td>
                                    <td>{{ $Ditem->IDETAIL }}</td>
                                    <td><a href="confirms/editmovedelete/{{$Ditem->IID}}">>>詳細確認</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">新商品申請一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Eitems as $Eitem)
                                <tr>
                                    <td>{{ $Eitem->id }}</td>
                                    <td>{{ $Eitem->name }}</td>
                                    <td>{{ $Eitem->type }}</td>
                                    <td>{{ $Eitem->detail }}</td>
                                    <td><a href="confirms/editaddmove/{{$Eitem->id}}">>>詳細確認</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
