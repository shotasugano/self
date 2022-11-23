@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品詳細</h1>
@stop


@section('content')
<!-- タスク登録用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->

    <!-- 新タスクフォーム -->
    <form action="{{ url('items/editapp/{id}') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
        <!-- アドレス -->
        <div class="form-group">
            <div class="col-sm-6">
                <input type="hidden" name="id" value="{{$item->id}}">
                <input type="text" name="name"  class="form-control" value="{{$item->name}}">
                <input type="text" name="type"  class="form-control" value="{{$item->type}}">
                <input type="text" name="detail"  class="form-control" value="{{$item->detail}}">

            </div>
        </div>
        <!--//ファイルを申請するボタン余裕が有ったらTODO-->
        <div class="form-group">
        <input type="file" class="form-control-file" name='image' id="image">
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa"></i> 編集申請
                </button>
            </div>
        </div>
    </form>
        <!-- アドレス削除ボタン -->
    <form action="{{ url('items/editappdelete/{id}') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="hidden" name="name"  class="form-control" value= "{{$item->name}}">
        <input type="hidden" name="type"  class="form-control" value= "{{$item->type}}">
        <input type="hidden" name="detail"  class="form-control" value= "{{$item->detail}}">
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa"></i> 削除申請
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
