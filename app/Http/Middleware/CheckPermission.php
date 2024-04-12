<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        if (!Auth::user()->can($permission)) {
            // Clear all sessions
            Session::flush();

            return redirect('/admin/login');
        }

        return $next($request);
    }
}
