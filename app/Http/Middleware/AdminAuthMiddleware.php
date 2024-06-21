<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userInfo = Auth::guard('admin')->user();
        $request_route  = $request->path();
        $route_explode  = explode('/', $request_route);
        $route_group    = $route_explode[0] . '/' . $route_explode[1];
        $is_auth = false;
        if ($userInfo != null) {
            $permission = Session::get('permission');
            foreach ($permission as $route) {
                if ($route->name == $route_group) {
                    $is_auth = true;
                }
            }
            if ($is_auth) {
                return $next($request);
            } else {
                abort('403');
            }

        } else {
            return redirect('admin-backend/login');
        }
    }
}
