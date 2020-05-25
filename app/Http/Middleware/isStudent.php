<?php

namespace App\Http\Middleware;

use Closure;

class isStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->route()->parameters()['user'];
        if ($user->role_id == 6) {
            return $next($request);
        }
        return redirect()->back();
    }
}
