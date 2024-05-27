<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        $admin = Auth::guard('admin')->user();
        if($admin){
            $adminInfo = Admin::where('admin_id', $admin->admin_id)->first();
            if ($adminInfo->hasRole($role)) {
                return $next($request);
            }
            return redirect()->route('Error.404');
        }
        return redirect()->route('admin.login.form');

    }
}
