<?php

namespace App\Http\Middleware;

use App\Evenement;
use Closure;

class isEnCours
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
        $id = $request->route()->parameters()['id'];
        $evenement = Evenement::find($id);
        if ($evenement->etat == 'En cours') {

            return $next($request);
        }
        return redirect()->back();
    }
}
