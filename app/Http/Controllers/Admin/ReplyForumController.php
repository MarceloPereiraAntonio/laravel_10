<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplyForumRequest;
use App\Services\ForumService;
use App\Services\ReplyForumService;
use Illuminate\Http\Request;

class ReplyForumController extends Controller
{
    public function __construct(
        protected ForumService $forumService,
        protected ReplyForumService $replyService
    )
    {}

    public function index(string $id)
    {
        if(!$data = $this->forumService->findOne($id)){
            return back();
        }

        $replies = $this->replyService->getAllByForumId($id);

        return view('admin.forum.replies.replies')
                ->with('data', $data)
                ->with('replies', $replies);
    }

    public function store(StoreReplyForumRequest $request)
    {
        $this->replyService->createNew(
            CreateReplyDTO::makeFromRequest($request)
        );

        return redirect()
                ->route('replies.index', $request->forum_id)
                ->with('message', 'Cadastrado com sucesso !');
    }

    public function destroy(string $forum_id, string $id)
    {
        $this->replyService->delete($id);

        return redirect()
                ->route('replies.index', $forum_id)
                ->with('message', 'Resposta deletada com sucesso !');
    }
}
