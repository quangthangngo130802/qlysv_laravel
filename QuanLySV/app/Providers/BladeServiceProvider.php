<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::if('hasRole', function ($role) {
            $admin = Auth::guard('admin')->user();
            $adminInfo = Admin::where('admin_id', $admin->admin_id)->first();
            if ($admin && $adminInfo->hasRole($role)) {
                return true;
            }
            return false;
        });
    }
}
