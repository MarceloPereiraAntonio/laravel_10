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
            <div class="col-sm">
                <div class="card" data-bs-theme="dark">
                    <div class="card-header">
                      User
                    </div>
                    <div class="card-body">
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm">
                <div class="card" data-bs-theme="dark">
                    <div class="card-header">
                      User
                    </div>
                    <div class="card-body">
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-danger">Deletar</a>
                    </div>
                </div>
            </div>
        </div>
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

