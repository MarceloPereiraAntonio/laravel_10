<?php

namespace App\DTO\Supports;

use App\Enums\ForumStatusEnum;
use App\Http\Requests\ForumCreateUpdateRequest;

class UpdateForumDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public ForumStatusEnum $status,
        public string $body)
    {

    }

    public static function makeFromRequest(ForumCreateUpdateRequest $request)
    {
        return new self(
            $request->id,
            $request->subject,
            ForumStatusEnum::A,
            $request->body
        );
    }

}
