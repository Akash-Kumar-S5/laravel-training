<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class PermissionComposer
{
    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {

        $permissions = Cache::remember('permissions', 15 * 60, function () {
            return Permission::all();

        });
        $view->with(compact('permissions'));
    }
}
