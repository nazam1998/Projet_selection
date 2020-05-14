<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;

class Contact
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
        $contact = Permission::where('nom', 'LIKE', '%contact%')->first()->id;

        if (Auth::user()->role->permissions->contains($contact)) {
            return $next($request);
        }
        return redirect()->back()->with('alert', "Vous n'avez pas l'autorisation d'accéder à cette page");
    }
}
