<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;

class Group
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
        $group = Permission::where('nom', 'LIKE', '%group%')->first()->id;

        if (Auth::user()->role->permissions->contains($group)) {
            return $next($request);
        }
        return redirect()->back()->with('alert', "Vous n'avez pas l'autorisation d'accéder à cette page");
    }
}
