<style>
    input, textarea {
        background-color: #1817171c !important;
    }
</style>
<x-alert/>
@csrf
<div class="mb-3">
    <label for="subject" class="form-label"><span class="badge text-bg-dark">Assunto</span></label>
    <input type="text" class="form-control" name="subject" value="{{$data->subject ?? old('subject')}}" >
</div>
<div class="mb-3">
    <label for="body" class="form-label"><span class="badge text-bg-dark">Menssagem</span></label>
    <textarea name="body" class="form-control"  cols="30" rows="10" placeholder="Escreva sua pergunta...">{{$data->body ?? old('body')}}</textarea>
</div>
<div class="d-flex">
    <button class="btn btn-success" type="submit">Enviar</button>
    <a href="{{redirect()->getUrlGenerator()->previous()}}" type="button" class="btn btn-secondary ms-2" >Voltar</a>
</div>

