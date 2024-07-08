@extends('admin.layout.app')

@section('title', 'Forum')

@section('header')
@include('admin.forum.partils.header', [
    'total' => $data->total()
])
@endsection

@section('content')

@include('admin.forum.partils.content')

@endsection
