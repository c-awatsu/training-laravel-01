@extends('layouts.app')
@section('title', '商品編集')
@section('content')
    @include('layouts.error')
    {{ Form::open(['route' => ['items.update', $item->id], 'method' => 'put']) }}
    <div class="form-group">
        {{ Form::label('name', '商品名') }}
        {{ Form::text('name', $item->name, ['class' => 'form-control']) }}

        {{ Form::label('name', 'カテゴリ') }}
        {{ Form::select('category_id', $categories, $item->category->id,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('更新', ['class' => 'btn btn-success form-control']) }}
    </div>
    {{ Form::close() }}
    <p>{{ link_to_route('items.index', '一覧に戻る') }}</p>
@endsection
