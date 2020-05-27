<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class isCandidat
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
        }
        if ($user->role_id == 7) {
            return $next($request);
        }
        return redirect()->back();
    }
}
