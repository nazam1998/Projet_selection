<?php

namespace App\Http\Middleware;

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
        $user=$request->route()->parameters()['user'];
        if ($user->role->id==7) {
            return $next($request);
        }
        return redirect()->back();
    }
}
