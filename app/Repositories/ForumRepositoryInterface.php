<?php

namespace App\Repositories;

use App\DTO\Supports\{CreateForumDTO, UpdateForumDTO};
use stdClass;

interface ForumRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15,  string $filter = null): PaginationInterface;
    public function getAll(string $filter = null ): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateForumDTO $dto): stdClass;
    public function update(UpdateForumDTO $dto): stdClass|null;
}
