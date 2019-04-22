@extends('layouts.app')
@section('title', 'カテゴリー登録')
@section('content')
    @include('layouts.error')
    {{ Form::open(['route' => 'categories.store']) }}
    <div class="form-group">
        {{ Form::label('name', 'カテゴリー名：') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('登録', ['class' => 'btn btn-primary form-control']) }}
    </div>
    {{ Form::close() }}
    <p>{{ link_to_route('categories.index', '一覧に戻る') }}</p>
@endsection
