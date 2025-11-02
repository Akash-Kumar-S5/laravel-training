<?php

namespace App\Providers;

use App\Http\View\Composers\PermissionComposer;
use App\Http\View\Composers\RoleComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('admin.permissions.index',PermissionComposer::class);
        View::composer('admin.roles.index',RoleComposer::class);
    }
}
