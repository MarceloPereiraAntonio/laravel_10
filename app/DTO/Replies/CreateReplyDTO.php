<?php

namespace App\DTO\Replies;

class CreateReplyDTO
{
    public function __construct(
        public string $forumId,
        public string $content)
    {}

    public static function makeFromRequest(object $request)
    {
        return new self(
            $request->forum_id,
            $request->content
        );
    }
}
