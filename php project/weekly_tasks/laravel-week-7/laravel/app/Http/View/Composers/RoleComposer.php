<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleComposer
{
    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $roles = Cache::remember('roles', 15*60 , function () {
            return Role::whereNotIn('name', ['admin'])->get();

        });
        $view->with(compact('roles'));
    }
}
