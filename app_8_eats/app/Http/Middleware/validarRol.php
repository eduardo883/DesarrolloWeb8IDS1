<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class validarRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $rol)
    {
        if($request->user()->rol == $rol){
            return $next($request);
        }else{
            // $mensaje = 'Acceso No Permitido a: ' . $request->user()->name;
            // abort(403, $mensaje);
            return redirect()->to('/home');
        }   
    }
}
