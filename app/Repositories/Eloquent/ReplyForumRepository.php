<?php

namespace App\Repositories\Eloquent;

use App\DTO\Replies\CreateReplyDTO;
use App\Models\ReplyForum;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use stdClass;

class ReplyForumRepository implements ReplyRepositoryInterface
{
    public function __construct(protected ReplyForum $model)
    {}
    public function getAllByForumId(string $forumId): array
    {
        $replies = $this->model
                        ->with(['user', 'forum'])
                        ->where('forum_id', $forumId)->get();
        return $replies->toArray();
    }
    public function createNew(CreateReplyDTO $dto): stdClass
    {
        $reply = $this->model->create([
            'content'  => $dto->content,
            'forum_id' => $dto->forumId,
            'user_id'  => Auth::user()->id
        ]);
        $reply = $reply->with('user')->first();

        return (object) $reply->toArray();
    }

    public function delete(string $id): bool
    {
        if(!$reply = $this->model->find($id)){
            return false;
        }
        if(Gate::denies('owner', $reply->user->id)){
            abort('403', 'Not Authorized');
        }
        return (bool) $reply->delete($id);
    }
}
