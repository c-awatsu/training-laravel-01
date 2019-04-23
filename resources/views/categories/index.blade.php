@extends('layouts.app')
@section('title', 'カテゴリ一覧')
@section('content')
    {{ link_to_route('categories.create', '新規登録',[],['class' => 'btn btn-primary']) }}
    {{ link_to_route('items.index', '商品一覧',[],['class'=>'btn btn-success']) }}

    <div class="row" style="margin-top: 10px">
        {{ Form::open(['route' => ['categories.search'], 'method' => 'get']) }}
        <div class="col-md-6 form-group">
            {{ Form::text('searchWords', null, ['class' => 'form-control', 'placeholder' => '商品名で検索']) }}
        </div>
        <div class="col-md-3 form-group">
            {{ Form::submit('検索', ['class' => 'btn btn-success form-control']) }}
        </div>
        {{ Form::close() }}

        {{ Form::open(['route' => ['categories.index'], 'method' => 'get']) }}
        <div class="col-md-3 form-group">
            {{ Form::submit('検索結果をクリア', ['class' => 'btn btn-danger form-control']) }}
        </div>
        {{ Form::close() }}
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>カテゴリ名</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ link_to_route('categories.show', $category->id, ['category' => $category->id]) }}</td>
                <td>{{ $category ->name }}</td>
                <td>{{ link_to_route('categories.edit', '編集', ['id' => $category->id],['class'=>'btn btn-default']) }}</td>
                <td>
                    {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) }}
                    {{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if(isset($searchWords))
        {{ $categories->appends(['searchWords'=>$searchWords])->links() }}
    @else
        {{ $categories->links() }}
    @endif
@endsection

