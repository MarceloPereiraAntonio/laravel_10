<?php

namespace App\Repositories\Contracts;

use App\DTO\Replies\CreateReplyDTO;
use stdClass;

interface ReplyRepositoryInterface
{
    public function getAllByForumId(string $forumId): array;
    public function createNew(CreateReplyDTO $dto): stdClass;
}
