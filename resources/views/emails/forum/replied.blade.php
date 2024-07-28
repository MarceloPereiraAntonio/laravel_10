<x-mail::message>
# Dúvida Respondida

Assunto da dúvida {{ $reply->forum_id }} foi respondido com {{ $reply->content }}

<x-mail::button :url="route('replies.index', $reply->forum_id)">
Ver
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
