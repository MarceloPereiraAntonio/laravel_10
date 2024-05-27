<h1>Editar pergunta</h1>
<x-alert/>
<form action="{{route('forum.update', $data->id)}}" method="post">
    @method('PUT')
    @include('admin.forum.partils.form', [
        'data' => $data
        ])
</form>
