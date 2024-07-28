<?php

namespace App\DTO\Replies;

use App\Http\Requests\StoreReplyForumRequest;

class CreateReplyDTO
{
    public function __construct(
        public string $forumId,
        public string $content)
    {}

    public static function makeFromRequest(StoreReplyForumRequest $request)
    {
        return new self(
            $request->forum_id,
            $request->content
        );
    }
}
