@extends('layouts.app')
@section('title', 'カテゴリー登録')
@section('content')
    @include('layouts.error')
    {{ Form::open(['route' => 'categories.store']) }}
    <div class="row" style="margin-top: 10px">
        <div class="col-md-6 form-group">
            {{ Form::text('searchWords', null, ['class' => 'form-control', 'placeholder' => '商品名で検索']) }}
        </div>
        <div class="col-md-4 form-group">
            {{ Form::submit('検索', ['class' => 'btn btn-default form-control']) }}
        </div>
    </div>
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
