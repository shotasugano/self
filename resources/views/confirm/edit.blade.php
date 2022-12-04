@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品詳細</h1>
@stop


@section('content')
<!-- タスク登録用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->

    <!-- 変更前の詳細 -->
    <p>変更前の情報</p>
    <div class ="container">
        
        <div class="card">
        <p class="card-title"> 名前</p>
        <p>{{$Citem->INAME}}</p>
        </div>
 
        <div class="card">
        <p class="card-title"> 種別</p>
        <p>{{$Citem->ITYPE}}</p>
        </div>

        <div class="card">
        <p class="card-title"> 詳細</p>
        <td>{{$Citem->IDETAIL}}</td>
        </div>
    </div>

    <!-- 新タスクフォーム -->
    <p>変更後の情報</p>
    <form action="{{ url('confirms/editapprove/{id}') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
        <!-- アドレス -->
        <div class="form-group">
            <div class="col-sm-6">
                <input type="hidden" name="id" value="{{$Citem->id}}">
                <input type="hidden" name="IID" value="{{$Citem->IID}}">
                <input type="hidden" name="name"  class="form-control" value="{{$Citem->name}}">
                <input type="hidden" name="type"  class="form-control" value="{{$Citem->type}}">
                <input type="hidden" name="detail"  class="form-control" value="{{$Citem->detail}}">
            </div>
        </div>
        <div class ="container">
            <div class="card">
            <p class="card-title"> 名前</p>
            <p>{{$Citem->name}}</p>
            </div>
            <div class="card">
            <p class="card-title"> 種別</p>
            <p>{{$Citem->type}}</p>
            </div>
            <div class="card">
            <p class="card-title"> 詳細</p>
            <p>{{$Citem->detail}}</p>
            </div>
        </div>
        <!--//ファイルを申請するボタン余裕が有ったらTODO-->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa "></i> 編集承認
                </button>
            </div>
        </div>
    </form>
        <!-- 編集却下 -->
    <form action="{{ url('confirms/editdeny/{id}') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$Citem->IID}}">
        <input type="hidden" name="name" value="{{$Citem->INAME}}">
        <input type="hidden" name="type" value="{{$Citem->ITYPE}}">
        <input type="hidden" name="detail" value="{{$Citem->IDETAIL}}">
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa "></i> 編集却下
                </button>
            </div>
        </div>
    </form>
</div>
@stop
@section('css')
@stop

@section('js')
@stop