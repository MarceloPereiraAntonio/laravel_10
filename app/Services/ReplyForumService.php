<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use stdClass;

class ReplyForumService
{
    public function getAllByForumId(string $forumId): array
    {
        return [];
    }

    public function createNew(CreateReplyDTO $dto): stdClass
    {
        throw new \Exception('not implemented');
    }

}
