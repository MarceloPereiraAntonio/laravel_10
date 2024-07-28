<?php

namespace App\Listeners;

use App\Events\ForumReplied;
use App\Mail\ForumRepliedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailWhenForumReplied
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ForumReplied $event): void
    {
        $reply = $event->reply();
        Mail::to($reply->user['email'])->send(
            new ForumRepliedMail($reply)
        );
    }
}
