<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;

class Annonce
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
        $annonce = Permission::where('nom', 'LIKE', '%annonce%')->first()->id;
        if (Auth::user()->role->permissions->contains($annonce)) {
            return $next($request);
        }
        return redirect()->back()->with('alert', "Vous n'avez pas l'autorisation d'accéder à cette page");
    }
}
