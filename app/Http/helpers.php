<?php

use App\Models\Cotizacione;
use App\Models\Empresa;
use App\Models\Log;
use App\Models\Producto;
use App\Models\Respuesta;
use App\Models\Usuariosempresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function per_padresv2()
{
    $per_usu = DB::table('permisos')
    ->join('modulos','permisos.id','=','modulos.id_permiso')
    ->join('rolmodulos','modulos.id','=','rolmodulos.id_modulo')
    ->join('roles','rolmodulos.id_rol','=','roles.id')
    ->join('usuarioroles','usuarioroles.id_rol','=','roles.id')
    ->where('usuarioroles.id_usuario',Auth::user()->id)
    ->where('permisos.per_estado',1)
    ->select('permisos.*')
    ->groupBy('permisos.id')
    ->get();

    $token = [];

    foreach($per_usu as $p)
    {
        $token[] = [
            'id' => $p->per_padre
        ];
    }

    $per_padre = DB::table('permisos')->whereIn('id',$token)->orderBy('permisos.per_order','ASC')->get();
    
    return $per_padre;

}

function per_hijos($id)
{

    $per_hijos = DB::table('permisos')
    ->join('modulos','permisos.id','=','modulos.id_permiso')
    ->join('rolmodulos','modulos.id','=','rolmodulos.id_modulo')
    ->join('roles','rolmodulos.id_rol','=','roles.id')
    ->join('usuarioroles','usuarioroles.id_rol','=','roles.id')
    ->where('usuarioroles.id_usuario',Auth::user()->id)
    ->where('permisos.per_mostrar',1)
    ->where('permisos.per_estado',1)
    ->where('permisos.per_padre',$id)
    ->select('permisos.*')
    ->groupBy('permisos.id')
    ->orderBy('permisos.per_order','ASC')
    ->get();
    
    return $per_hijos;
}

function  modulos($id)
{

    $modulos = DB::table('modulos')
    ->where('modulos.id_permiso',$id)
    ->where('modulos.mod_estado',1)
    ->orderBy('mod_order','ASC')
    ->get();

    return $modulos;

}

function respuesta($id)
{
    $respuesta = Respuesta::where('id_pregunta',$id)->where('res_estado',1)->select()->get();

    return $respuesta;
}

function rolmodulos($id_modulo, $id_rol)
{

    $modulos = DB::table('rolmodulos')->where('id_modulo',$id_modulo)->where('id_rol',$id_rol)->first();

    $respuesta = false;

    if(!is_null($modulos))
    {
        $respuesta = true;
    }

    return $respuesta;

}

function EmpresasUser($id)
{
    $user = Usuariosempresa::where('id_usuario',$id)->get();

    $emp = [];

    foreach ($user as $u)
    {
        if($u->id_empresa == 9)
        {
            return Empresa::where('emp_estado',1)->get();
        }
        else
        {
            $emp = [
                'id_empresa' => $u->id_empresa
            ];
        }
    }

    $empresas = Empresa::whereIn('id',$emp)->get();

    return $empresas;
    
}

function EmpresaUsiario($id)
{
    $res = Usuariosempresa::where('id_usuario',$id)->where('usm_estado',1)->first();

    return $res->id_empresa;
}

function productos($id)
{

    $productos = Producto::where('id_categoria',$id)->where('pro_estado',1)->get();

    return $productos;

}

function Cotizacion($id)
{
    $cotizacion = new Cotizacione();

    $cotizacion->id_empresa = $id;
    $cotizacion->id_usuario = Auth::user()->id;
    $cotizacion->cot_estado = 4;
    $cotizacion->save();

    $log = new Log();

    $log->log_accion = "Genera la cotizacion N°".$cotizacion->id." para la empresa ID:".$id;
    $log->log_ruta = "--";
    $log->id_usuario = Auth::user()->id;
    $log->save();
    
    return $cotizacion->id;
}
function Cotizacioncliente($id)
{
    $cotizacion = new Cotizacione();

    $cotizacion->id_cliente = $id;
    $cotizacion->id_usuario = Auth::user()->id;
    $cotizacion->cot_estado = 4;
    $cotizacion->save();

    $log = new Log();

    $log->log_accion = "Genera la cotizacion N°".$cotizacion->id." para el cliente ID:".$id;
    $log->log_ruta = "--";
    $log->id_usuario = Auth::user()->id;
    $log->save();
    
    return $cotizacion->id;
}

function getWeeks($date, $rollover)
{
    $cut = substr($date, 0, 8);
    $daylen = 86400;

    $timestamp = strtotime($date);
    $first = strtotime($cut . "00");
    $elapsed = ($timestamp - $first) / $daylen;

    $weeks = 1;

    for ($i = 1; $i <= $elapsed; $i++)
    {
        $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
        $daytimestamp = strtotime($dayfind);

        $day = strtolower(date("l", $daytimestamp));

        if($day == strtolower($rollover))  $weeks ++;
    }

    return $weeks;
}

?>