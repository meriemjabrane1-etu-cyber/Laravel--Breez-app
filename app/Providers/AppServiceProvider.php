<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Task;
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
        Gate::define('manage_tasks', function (User $user) {
            return $user->role === 'manager';
        });

        Gate::define('update_task', function (User $user, Task $task) {
            return $user->role === 'manager';
        });

        Gate::define('complete_task', function (User $user, Task $task) {
            return $user->role === 'employee';
        });
    }
}
