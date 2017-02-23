<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null){
        
        $uri = $request->path();
        
        if($uri !== 'bienvenido'){
            if (Auth::guard($guard)->guest()) { //si no esta auth
                if ($request->ajax() || $request->wantsJson()) {
                    return response('Unauthorized.', 401);
                } else {
                   return redirect()->guest('/bienvenido');
               }
           }
       }else if(!Auth::guard($guard)->guest() && $uri == 'bienvenido'){ //Si esta auth y la ruta es '/bienvenido', redireccionar a  '/'
       return redirect()->guest('/');
   }
   return $next($request);
  }
}
