<?php

namespace App\Providers;

use App\Models\Forum;
use App\Observers\ForumObserver;
use App\Repositories\ForumEloquentORM;
use App\Repositories\Contracts\{ForumRepositoryInterface, ReplyRepositoryInterface};
use App\Repositories\Eloquent\ReplyForumRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ForumRepositoryInterface::class, ForumEloquentORM::class);
        $this->app->bind(ReplyRepositoryInterface::class, ReplyForumRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Forum::observe(ForumObserver::class);
    }
}
