<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if ($user->role_id != 1) {
            return $next($request);
        }
        return redirect()->back()->with('msg', 'Vous ne pouvez pas supprimer cet utilisateur');
    }
}
