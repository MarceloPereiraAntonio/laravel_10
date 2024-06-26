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
        width: 30px;
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
                            <span class="badge text-bg-success">{{ getStatusForum($item->status)}}</span>
                        </td>
                        <td>{{$item->body}}</td>
                        <td>
                            <div class="avatars">
                                <span class="avatar">
                                    <img src="data:image/jpeg;base64,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" alt="user">
                                </span>
                                <span class="avatar">
                                    <img src="https://img.freepik.com/premium-vector/young-smiling-man-avatar-man-with-brown-beard-mustache-hair-wearing-yellow-sweater-sweatshirt-3d-vector-people-character-illustration-cartoon-minimal-style_365941-860.jpg" alt="user">
                                </span>
                                <span class="avatar">
                                    <img src="https://img.freepik.com/premium-vector/young-smiling-man-avatar-man-with-brown-beard-mustache-hair-wearing-yellow-sweater-sweatshirt-3d-vector-people-character-illustration-cartoon-minimal-style_365941-860.jpg" alt="user">
                                </span>
                            </div>
                        </td>
                        <td>
                            <a href="{{route('forum.edit', $item->id)}}">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
