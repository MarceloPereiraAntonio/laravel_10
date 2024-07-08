@extends('admin.layout.app')

@section('header')
<h1>Detalhes da pergunta {{$data->id}}</h1>
@endsection

@section('content')
<ul>
    <li>{{$data->subject}}</li>
    <li>{{$data->body}}</li>
    <li>{{$data->status}}</li>
</ul>

<form action="{{route('forum.destroy', $data->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar</button>
    <a href="{{redirect()->getUrlGenerator()->previous()}}" type="button" class="btn btn-secondary ms-2" >Voltar</a>
</form>
@endsection
