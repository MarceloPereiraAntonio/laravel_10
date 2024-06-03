<?php

use App\Enums\ForumStatusEnum;

if(!function_exists('getStatusForum')){
    function getStatusForum(string $status): string {
        return ForumStatusEnum::fromValue($status);
    }
}
