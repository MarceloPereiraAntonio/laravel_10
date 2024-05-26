<h1>Detalhes da pergunta {{$data->id}}</h1>

<ul>
    <li>{{$data->subject}}</li>
    <li>{{$data->body}}</li>
    <li>{{$data->status}}</li>
</ul>

<form action="{{route('forum.destroy', $data->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>
