<?php

namespace App\DTO;

use App\Http\Requests\ForumCreateUpdateRequest;

class CreateForumDTO
{
    public function __construct(public string $subject, public string $status, public string $body)
    {

    }

    public static function makeFromRequest(ForumCreateUpdateRequest $request)
    {
        return new self(
            $request->subject,
            'a',
            $request->body
        );
    }

}
