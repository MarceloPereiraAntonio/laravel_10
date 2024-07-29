<?php

namespace App\Listeners;

use App\Enums\ForumStatusEnum;
use App\Events\ForumReplied;
use App\Services\ForumService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeStatusForum
{
    /**
     * Create the event listener.
     */
    public function __construct(protected ForumService $forumService )
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ForumReplied $event): void
    {
        $reply = $event->reply();

        $this->forumService->updateStatus(
            id: $reply->forum_id,
            status: ForumStatusEnum::P,
        );
    }
}
