<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Log;
use App\Models\Role;
use App\Models\rolmodulo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $auth_emp = EmpresasUser(Auth::user()->id);

        $id_empresas = [];
        
        foreach ($auth_emp as $a)
        {
            $id_empresas[] = [
                'id_empresas' => $a->id
            ];
        }

        $roles = DB::table('roles')
                ->join('empresas','roles.id_empresa','=','empresas.id')
                ->where('empresas.emp_estado',1)
                ->whereIn('empresas.id',$id_empresas)
                ->select('roles.*','empresas.emp_nombre')
                ->paginate();

        $permisos = DB::table('usuarioroles')
                    ->join('roles','usuarioroles.id_rol','=','roles.id')
                    ->join('rolmodulos','roles.id','=','rolmodulos.id_rol')
                    ->join('modulos','rolmodulos.id_modulo','=','modulos.id')
                    ->join('permisos','modulos.id_permiso','=','permisos.id')
                    ->where('usuarioroles.id_usuario', Auth::user()->id )
                    ->select('permisos.*')
                    ->groupBy('permisos.id')
                    ->get();

        $rol = new Role();
        $empresas = Empresa::all();
        
        return view('role.index', compact('roles','permisos','rol','empresas'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());

    }
   
    public function store()
    {
        $this->Response = ['State' => 200];

        switch($_SERVER['REQUEST_METHOD'])
            {
                case 'POST':

                $id_modulos = isset($_POST['id_modulo']) ? $_POST['id_modulo'] : [];
                $rol_nombre = isset($_POST['rol_nombre']) ? trim($_POST['rol_nombre']) : '';
                $id_empresa = isset($_POST['id_empresa']) ? (int)$_POST['id_empresa'] : 0;

                $id = isset($_POST['id_rol']) ? (int)$_POST['id_rol'] : 0;
                

                if(is_null($rol_nombre) || $rol_nombre == '')
                {
                    $this->Response['Message'] = 'Debes ingresar el nombre';
                    $this->Response['State'] = 401;
                    break;
                }
                if(count($id_modulos) < 0)
                {
                    $this->Response['Message'] = 'Debes ingresar al menos un modulo';
                    $this->Response['State'] = 401;
                    break;
                }
                if($id_empresa <= 0)
                {
                    $this->Response['Message'] = 'Debes ingresar la empresa';
                    $this->Response['State'] = 401;
                    break;
                }

                if($id == 0)
                {
                    $rol = new Role();

                    $rol->rol_nombre = $rol_nombre;
                    $rol->id_empresa = $id_empresa;
                    $rol->save();
                    
                    $log = new Log();

                    $log->log_accion = "Crea el rol ID".$rol->id;
                    $log->log_ruta = "roles.store";
                    $log->id_usuario = Auth::user()->id;
                    $log->save();
                    
                    foreach($id_modulos as $id)
                    {
                        $rolmodulo = new rolmodulo();
                        $rolmodulo->id_modulo = $id;
                        $rolmodulo->id_rol = $rol->id;
                        $rolmodulo->save();
                    }
                    $this->Response['Message'] = 'Rol creado correctamente!.';

                }
                else
                {
                    $r = Role::where('id',$id)->first();

                    $r->rol_nombre = $rol_nombre;
                    $r->id_empresa = $id_empresa;
                    $r->save();

                    DB::table('rolmodulos')->where('id_rol',$r->id)->delete();

                    foreach($id_modulos as $id)
                    {
                        $rolmodulo = new rolmodulo();
                        $rolmodulo->id_modulo = $id;
                        $rolmodulo->id_rol = $r->id;
                        $rolmodulo->save();
                    }
                    $log = new Log();

                    $log->log_accion = "Modifica el rol ID".$r->id;
                    $log->log_ruta = "roles.store";
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    $this->Response['Message'] = 'Rol editado correctamente!.';

                }
                
                break;

                default:

                $this->Response['status'] = 0;
                $this->Response['Message'] = 'Methodo no definido';
                break;

            }

        return response()->json($this->Response);
        
    }

    public function show($id)
    {
        $rol = DB::table('roles')->join('empresas','roles.id_empresa','=','empresas.id')->where('roles.id',$id)->select('roles.*','empresas.emp_nombre')->first();

        $permisos = DB::table('usuarioroles')
        ->join('roles','usuarioroles.id_rol','=','roles.id')
        ->join('rolmodulos','roles.id','=','rolmodulos.id_rol')
        ->join('modulos','rolmodulos.id_modulo','=','modulos.id')
        ->join('permisos','modulos.id_permiso','=','permisos.id')
        ->where('usuarioroles.id_usuario', Auth::user()->id )
        ->select('permisos.*')
        ->groupBy('permisos.id')
        ->get();

        $rolmodulos = DB::table('rolmodulos')->join('modulos','rolmodulos.id_modulo','=','modulos.id')->where('rolmodulos.id_rol',$id)->get();
        
        $empresas = Empresa::all();

        return view('role.show', compact('rol','permisos','rolmodulos','empresas'));
    }

    public function enable()
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $rol = Role::where('id',$id)->first();

        $rol->rol_estado = 1;
        $rol->save();

        $log = new Log();

        $log->log_accion = "Habilita rol ID:".$rol->id;
        $log->log_ruta = "roles.enable";
        $log->id_usuario = Auth::user()->id;
        $log->save();

        $estado = true;

        return ['res'=>$estado];
    }

    public function delete()
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $rol = Role::where('id',$id)->first();

            $rol->rol_estado = 0;
            $rol->save();
            $log = new Log();

            $log->log_accion = "Deshabilita rol ID :".$rol->id;
            $log->log_ruta = "roles.delete";
            $log->id_usuario = Auth::user()->id;
            $log->save();

            $estado = true;

        return ['res'=>$estado];
    }
    
    public function ajax()
    {
        $this->Reponse = [

            'Status' => 1,
            'Message' => 'OK'
        ];

        switch ($_SERVER['REQUEST_METHOD'])
        {

            case "POST":

                $id_empresa = isset($_POST['id_empresa']) ? (int)$_POST['id_empresa'] : 0;
                $term = isset($_POST['q']) ? trim($_POST['q']) : null;

                $items = [];
                $n = 0;

                if($id_empresa != 0) 
                {
                    $roles_set = Role::where('id_empresa','=',$id_empresa);

                    if(!is_null($term))
                    {
                        $roles_set = $roles_set->Where("roles.rol_nombre LIKE '% ".$term."%' " );
                    }

                    $roles_rs = $roles_set
                        ->groupBy('roles.id')
                        ->get();
                    
                    foreach($roles_rs as $rol)
                    {
                        $items[] = [

                            'id' => $rol->id,
                            'text' => $rol->rol_nombre

                        ];
                    }

                }

                $this->Response['items'] = $items;
                $this->Response['page'] = (int)$_POST['page'];
                break;

                default:
                $this->Response['Status'] = 0;
                $this->Response['Message'] = 'Metodo no definido';
                break;

        }

        return response()->json($this->Response);

    }

}
