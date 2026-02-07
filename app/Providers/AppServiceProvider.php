<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\TaskObserver;
use App\Models\Task;
use App\Observers\ApplyTaskObserver;
use App\Models\ApplyTask;
use Illuminate\Support\Facades\URL;

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
        if(env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        Task::observe(TaskObserver::class);
        ApplyTask::observe(ApplyTaskObserver::class);
    }
}
