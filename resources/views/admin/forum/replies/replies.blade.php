@extends('admin.layout.app')

@section('content')

<div class="container mt-3 d-flex justify-content-center ">
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm d-flex justify-content-between">
                <h4>Detalhes da pergunta {{$data->id}}</h4>
                <form class="align-self-baseline" action="{{route('forum.destroy', $data->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </div>
        <div class="row">
            <p>Status: <span class="badge text-bg-success">Open</span></p>
            <p>Descrição: {{$data->body}}</p>
        </div>
        @forelse ($replies as $reply)
            <div class="row mt-2">
                <div class="col-sm">
                    <div class="card" data-bs-theme="dark">
                        <div class="card-header">
                            {{$reply['user']['name']}}
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$reply['content']}}</p>
                            <div class="d-flex justify-content-sm-between">
                                <p class="mt-2"><span>{{$reply['created_at']}}</span></p>
                                <form action="{{route('replies.destroy',[$data->id, $reply['id']])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger align-self-baseline">Deletar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No replies</p>
        @endforelse

        <form action="{{route('replies.store', $data->id)}}" method="post">
            @csrf
            <input type="hidden" name="forum_id" value="{{$data->id}}">
            <div class="row mt-2">
                <div class="col-sm">
                    <textarea class="form-control" name="content" placeholder="Sua resposta..."></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="{{redirect()->getUrlGenerator()->previous()}}" type="button" class="btn btn-secondary " >Voltar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

