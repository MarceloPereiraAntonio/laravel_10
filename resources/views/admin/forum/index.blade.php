<h1>Lista de duvidas</h1>
<a href="{{route('forum.create')}}">Nova pergunta</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th>Detalhes</th>
    </thead>
    <tbody>
        @foreach ($data as $item )
            <tr>
                <td>{{$item->subject}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->body}}</td>
                <td><a href="{{route('forum.show', $item->id)}}">ir</a></td>
                <td><a href="{{route('forum.edit', $item->id)}}">editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
