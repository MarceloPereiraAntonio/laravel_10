@extends('admin.layout.app')

@section('title', 'Forum')

@section('header')

<h3>Forum <span class="badge rounded-pill text-bg-dark">{{$data->total()}}</span></h3>
@endsection

@section('content')

<a href="{{route('forum.create')}}">Nova pergunta</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th>Detalhes</th>
    </thead>
    <tbody>
        @foreach ($data->items() as $item )
            <tr>
                <td>{{$item->subject}}</td>
                <td>{{getStatusForum($item->status)}}</td>
                <td>{{$item->body}}</td>
                <td><a href="{{route('forum.show', $item->id)}}">ir</a></td>
                <td><a href="{{route('forum.edit', $item->id)}}">editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination :paginator="$data" :appends="$filters"/>
@endsection

