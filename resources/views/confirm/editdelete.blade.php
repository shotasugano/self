@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>削除申請商品詳細</h1>
@stop


@section('content')
<!-- タスク登録用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->

    <!-- 新タスクフォーム -->
    <table border="1">
    <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->type}}</td>
      <td>{{$item->detail}}</td>
    </tr>
  </table>
    <form action="{{ url('confirms/editdeleteapprove/{id}') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
        <!-- アドレス -->
        <div class="form-group">
            <div class="col-sm-6">
                <input type="hidden" name="id" value="{{$item->id}}">
                <input type="hidden" name="name"  class="form-control" value="{{$item->name}}">
                <input type="hidden" name="type"  class="form-control" value="{{$item->type}}">
                <input type="hidden" name="detail"  class="form-control" value="{{$item->detail}}">
            </div>
        </div>
        <!--//ファイルを申請するボタン余裕が有ったらTODO-->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa"></i> 削除申請承認
                </button>
            </div>
        </div>
    </form>
        <!-- アドレス削除ボタン TODO-->
    <form action="{{ url('confirms/editdeletedeny/'.$item->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="hidden" name="name"  class="form-control" value= "{{$item->name}}">
        <input type="hidden" name="type"  class="form-control" value= "{{$item->type}}">
        <input type="hidden" name="detail"  class="form-control" value= "{{$item->detail}}">
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa"></i> 削除申請否認
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
