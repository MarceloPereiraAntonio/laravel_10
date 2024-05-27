@csrf
<label for="subject">Assunto</label>
<input type="text" name="subject" value="{{$data->subject ?? old('subject')}}">
<label for="body">
    Menssagem
    <textarea name="body"  cols="30" rows="10">{{$data->body ?? old('body')}}</textarea>
</label>
<button type="submit">Enviar</button>
