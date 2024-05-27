<h1>Editar pergunta</h1>

<ul>
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
        @endforeach
    @endif
</ul>

<form action="{{route('forum.update', $data->id)}}" method="post">
    @csrf
    @method('PUT')
    <label for="subject">Assunto</label>
    <input type="text" name="subject" value="{{$data->subject}}">
    <label for="body">
        Menssagem
        <textarea name="body"  cols="30" rows="10"> {{$data->body}}</textarea>
    </label>
    <button type="submit">Enviar</button>
</form>
