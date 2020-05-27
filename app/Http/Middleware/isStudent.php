<?php

namespace App\Http\Middleware;

use App\Role;
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
        if(is_numeric($user)){
            $user=User::withTrashed()->whereId($user)->first();
            $role=Role::find($user->role_id);
        }else{
            $role = $user->role;
        }
        if ($user->role_id == 6) {
            return $next($request);
        }
        return redirect()->back();
    }
}
