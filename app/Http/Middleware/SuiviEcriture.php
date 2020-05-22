<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class SuiviEcriture
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
        $role = Auth::user()->role->roles()->where('role_id', $user->role->id)->first();

        if (Auth::user()->role->roles->contains($user->role->id) && $role->pivot->ecriture) {

            return $next($request);
        }
        return redirect()->back()->with('msg', "Vous n'avez pas la permission de modifier cet utilisateur");
    }
}
