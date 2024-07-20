<?php

namespace App\Observers;

use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class ForumObserver
{

    public function creating(Forum $forum): void
    {

        $forum->user_id = Auth::user()->id;
    }

}
