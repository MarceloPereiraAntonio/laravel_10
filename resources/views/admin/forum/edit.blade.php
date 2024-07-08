
@extends('admin.layout.app')

@section('header')
<h1>Editar pergunta</h1>
@endsection
@section('content')
<form action="{{route('forum.update', $data->id)}}" method="post">
    @method('PUT')
    @include('admin.forum.partils.form', [
        'data' => $data
        ])
</form>
@endsection
