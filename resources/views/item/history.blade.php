@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>承認、否認の履歴</h1>
@stop


@section('content')
<!-- タスク登録用パネル… -->
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                            @foreach ($histories as $history)
                                <tr>
                                    <td>id「{{ $history->item_id }}」について</td>
                                    <td>{{ $history->created_at }}に</td>
                                    <td>{{ $history->action }}がされました</td>
                                    <td>
                                    <!-- TODO: 削除ボタン -->
                                    <form action="/items/historydelete/{{$history->id}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"  class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>削除
                                    </button>
                                    </form>
                                    </td>
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
