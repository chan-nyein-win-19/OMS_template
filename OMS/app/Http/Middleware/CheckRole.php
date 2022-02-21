<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle(Request $request, Closure $next,$role)
    {
        $roles=explode("|",$role);
        foreach($roles as $onerole){
            if (Auth::user() &&  Auth::user()->role == $onerole) {
                return $next($request);
        }
        
     }
      abort(403, 'Unauthorized action.');
    }
}
