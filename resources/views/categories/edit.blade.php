@extends('layouts.app')
@section('title', 'カテゴリ編集')
@section('content')
    @include('layouts.error')
    {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) }}
    <div class="form-group">
        {{ Form::label('name', 'カテゴリ名') }}
        {{ Form::text('name', $category->name, ['class'=> 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('更新', ['class' => 'btn btn-success form-control']) }}
    </div>
    {{ Form::close() }}
    <p>{{ link_to_route('categories.index', '一覧に戻る') }}</p>
@endsection
