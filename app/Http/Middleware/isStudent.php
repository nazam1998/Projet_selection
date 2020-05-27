<?php

namespace App\Http\Middleware;

use App\User;
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
        if(is_int($user)){
            $user=User::withTrashed()->find($user);
        }
        if ($user->role_id == 6) {
            return $next($request);
        }
        return redirect()->back();
    }
}
