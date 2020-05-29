<?php

namespace App\Http\Middleware;

use Closure;

class isEssential
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
        $role = $request->route()->parameters()['role'];
        if($role->id>7){

            return $next($request);
        }
        return redirect()->back()->with('msg','Vous ne pouvez pas supprimer ce rôle');
    }
}
