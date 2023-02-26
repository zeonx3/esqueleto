<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RolMiddleware
{
   
    public function handle(Request $request, Closure $next)
    {
        $ruta = $request->route()->getName();
       
        $rol_usuaurio = DB::table('usuarioroles')
        ->join('rolmodulos','usuarioroles.id_rol','=','rolmodulos.id_rol')
        ->join('modulos','rolmodulos.id_modulo','=','modulos.id')
        ->where('usuarioroles.id_usuario',Auth::User()->id)
        ->select('modulos.*')
        ->get();

        foreach($rol_usuaurio as $u)
        {
            if(trim($u->mod_accion) == trim($ruta))
            {
                return $next($request);
            }
        }

        return response()->view('error.403');
    }
}
