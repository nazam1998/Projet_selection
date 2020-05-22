<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class SuiviLecture
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
        $role = $user->role;

        if ($role->responsable && Auth::user()->role_id == 1 || (Auth::user()->role_id == 2 && Auth::user()->groups->contains($user->groups->first()->id))) {
            return $next($request);
        } else if (Auth::user()->role->roles->contains($role->id)) {

            return $next($request);
        }
        return redirect()->back()->with('msg', "Vous n'avez pas la permission de voir cet utilisateur");
    }
}
