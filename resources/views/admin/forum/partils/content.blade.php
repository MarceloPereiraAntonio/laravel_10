<style>
    .avatars {
        display: inline-flex;  /* deixa os elementos da div na mesma linha  */
        flex-direction: row-reverse;
    }
    .avatar {
        position: relative;
        display: inline-block;
        border: 1px solid #fff;
        border-radius: 50%;
        overflow: hidden;
        width: 32px;
        background-color: rgb(33, 80, 76);

    }
    .avatar:not(:last-child) {
        margin-left: -50px;
    }
    .avatar img {
        width: 100%;
        display: block;
    }
</style>

<div class="container mt-5 ">
    <div class="table-responsive card mb-2" data-bs-theme="dark">
        <table class="table table-sm" >
            <thead class="table-active">
                <tr>
                    <th scope="col">Assunto</th>
                    <th scope="col">Status</th>
                    <th scope="col">Comentário</th>
                    <th scope="col">Interações</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->items() as $item )
                    <tr>
                        <td>{{$item->subject}}</td>
                        <td>
                            <x-status-forum :status="$item->status"/>
                        </td>
                        <td>{{$item->body}}</td>
                        <td>
                            <div class="avatars">
                                @foreach ($item->replies as $reply)
                                    <span class="avatar">
                                        {{getInitials($reply['user']['name'])}}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                        <td >
                            <div class="d-flex justify-content-evenly">
                                @can('owner', $item->user_id)
                                <a href="{{route('forum.edit', $item->id)}}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                @endcan
                                <a href="{{route('replies.index', $item->id)}}">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-pagination :paginator="$data" :appends="$filters"/>
</div>
