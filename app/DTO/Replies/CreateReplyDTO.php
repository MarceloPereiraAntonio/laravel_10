<?php

namespace App\DTO\Replies;

class CreateReplyDTO
{
    public function __construct(
        public string $forumId,
        public string $content)
    {}
}
