<?php

namespace App\Http\Middleware;

use App\Role;
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
        if (is_numeric($user)) {
            $user = User::withTrashed()->whereId($user)->first();
            $role = Role::find($user->role_id);
        } else {
            $role = Auth::user()->role->roles()->where('role_id', $user->role->id)->first();
        }
        if ($role->responsable && Auth::user()->role_id == 1 || (Auth::user()->role_id == 2 && Auth::user()->groups->contains($user->groups->first()->id))) {

            return $next($request);
        } else if (Auth::user()->role->roles->contains($user->role->id) && $role->pivot->ecriture) {

            return $next($request);
        }
        return redirect()->back()->with('msg', "Vous n'avez pas la permission de modifier cet utilisateur");
    }
}
