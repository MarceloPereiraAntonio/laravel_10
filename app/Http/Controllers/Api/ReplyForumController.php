<?php

namespace App\Http\Controllers\Api;

use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplyForumRequest;
use App\Http\Resources\ReplyForumResource;
use App\Services\ForumService;
use App\Services\ReplyForumService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplyForumController extends Controller
{
    public function __construct(
        protected ForumService $forumService,
        protected ReplyForumService $replyService
    )
    {}

    public function getRepliesFromForum(string $id)
    {
        if(!$this->forumService->findOne($id)){
            return response()->json([
                'message' => 'not_found'
            ], Response::HTTP_NOT_FOUND);
        }

        $replies = $this->replyService->getAllByForumId($id);

        return ReplyForumResource::collection($replies);
    }

    public function createNewReply(StoreReplyForumRequest $request)
    {
        $reply = $this->replyService->createNew(
            CreateReplyDTO::makeFromRequest($request)
        );

        return (new ReplyForumResource($reply))
                        ->response()
                        ->setStatusCode(Response::HTTP_CREATED);
    }


    public function destroy(string $id)
    {
        $this->replyService->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
