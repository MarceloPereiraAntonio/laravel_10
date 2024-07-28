<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use stdClass;

class ReplyForumService
{
    public function __construct(
        protected ReplyRepositoryInterface $repository
    )
    {}
    public function getAllByForumId(string $forumId): array
    {
        return $this->repository->getAllByForumId($forumId);
    }

    public function createNew(CreateReplyDTO $dto): stdClass
    {
        $forum = $this->repository->createNew($dto);
        return $forum;
    }

    public function delete(string $id): bool
    {
        return (bool) $this->repository->delete($id);
    }

}
