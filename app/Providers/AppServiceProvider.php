<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\TaskObserver;
use App\Models\Task;
use App\Observers\ApplyTaskObserver;
use App\Models\ApplyTask;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Task::observe(TaskObserver::class);
        ApplyTask::observe(ApplyTaskObserver::class);
    }
}
