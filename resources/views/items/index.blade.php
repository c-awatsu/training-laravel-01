@extends('layouts.app')
@section('title', '商品一覧')
@section('content')
    {{ link_to_route('items.create', '新規登録',[],['class' => 'btn btn-primary']) }}
    {{ link_to_route('categories.index', 'カテゴリ一覧',[],['class' => 'btn btn-success']) }}

    <div class="row" style="margin-top: 10px">
        {{ Form::open(['route' => ['items.search'], 'method' => 'get']) }}
        <div class="col-md-6 form-group">
            {{ Form::text('searchWords', null, ['class' => 'form-control', 'placeholder' => '商品名で検索']) }}
        </div>
        <div class="col-md-3 form-group">
            {{ Form::submit('検索', ['class' => 'btn btn-default form-control']) }}
        </div>
        {{ Form::close() }}

        {{ Form::open(['route' => ['items.index'], 'method' => 'get']) }}
        <div class="col-md-3 form-group">
            {{ Form::submit('検索結果をクリア', ['class' => 'btn btn-danger form-control']) }}
        </div>
        {{ Form::close() }}
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>カテゴリ名</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ link_to_route('items.show', $item->id, ['item' => $item->id]) }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ link_to_route('items.edit', '編集', ['id' => $item->id],['class'=>'btn btn-default']) }}</td>
                <td>
                    {{ Form::open(['route' => ['items.destroy', $item->id],'method' => 'delete']) }}
                    {{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if(isset($searchWords))
        {{ $items->appends(['searchWords'=>$searchWords])->links() }}
    @else
        {{ $items->links() }}
    @endif
@endsection
