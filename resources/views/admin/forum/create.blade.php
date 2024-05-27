<h1>Cadastrar nova pergunta</h1>
<x-alert/>
<form action="{{route('forum.store')}}" method="post">
    @include('admin.forum.partils.form')

</form>
