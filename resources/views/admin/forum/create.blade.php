<h1>Cadastrar nova pergunta</h1>

<form action="{{route('forum.store')}}" method="post">
    @csrf


    <label for="subject">Assunto</label>
    <input type="text" name="subject">
    <label for="body">
        Menssagem
        <textarea name="body"  cols="30" rows="10"></textarea>
    </label>
    <button type="submit">Enviar</button>
</form>
