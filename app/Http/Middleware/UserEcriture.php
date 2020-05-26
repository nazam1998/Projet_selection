<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserEcriture
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

        $permissions = Auth::user()->role->permissions()->where('nom', 'LIKE', 'user-ecriture%')->first();
        if ($permissions) {

            return $next($request);
        }
        return redirect()->back()->with('msg',"Vous n'avez pas les permissions d'accèder à cette page");
    }
}
