<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Permission;

class Evenement
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
        $evenement = Permission::where('nom', 'LIKE', '%candidat-full%')->first()->id;
        if (Auth::user()->role->permissions->contains($evenement)) {
            return $next($request);
        }
        return redirect()->back()->with('alert', "Vous n'avez pas l'autorisation d'accéder à cette page");
    }
}
