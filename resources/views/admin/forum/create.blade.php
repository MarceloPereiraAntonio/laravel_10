@extends('admin.layout.app')

@section('header')
<h1>Cadastrar nova pergunta</h1>
@endsection
@section('content')

<x-alert/>
<form action="{{route('forum.store')}}" method="post">
    @include('admin.forum.partils.form')

</form>
@endsection
