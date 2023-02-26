<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Empresa;
use App\Models\Log;
use App\Models\Paises;
use App\Models\Role;
use App\Models\Usuario;
use App\Models\Usuariosempresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Yajra\Datatables\Datatables;


class UsuarioController extends Controller
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
        $usuarios = DB::table('usuarios')->get();
       
        $usuario = new Usuario();
        $pais = Paises::where('id','<>',0)->get();

        $roles = Role::Where('id_empresa',$id_empresas)->get();
    
        return view('usuario.index', compact('usuario','pais','roles'));
    }

    public function registros(Request $request)
    {

        $nombre = isset($request->nombrefil) ? trim($request->nombrefil) : '';
        $rut =    isset($request->rutfil) ? trim($request->rutfil) : '';
        $direccion = isset($request->direccionfil) ? trim($request->direccionfil) : '';
        $correo = isset($request->correofil) ? trim($request->correofil) : '';
        $telefono = isset($request->telefonofil) ? trim($request->telefonofil) : '';

        $auth_emp = EmpresasUser(Auth::user()->id);

        $id_empresas = [];
        
        foreach ($auth_emp as $a)
        {
            $id_empresas[] = [
                'id_empresas' => $a->id
            ];
        }

        $usuarios_set =  DB::table('usuarios')
            ->leftjoin('usuarioroles',    'usuarioroles.id_usuario','=','usuarios.id')
            ->leftjoin('direcciones','usuarios.id_direccion','=','direcciones.id')
            ->leftjoin('comunas','direcciones.id_comuna','=','comunas.id')
            ->join('regiones','comunas.id_region','=','regiones.id')
            ->join('paises','paises.id','=','regiones.id_pais')
            ->join('usuarioempresas','usuarios.id','=','usuarioempresas.id_usuario')
            ->where('usuarios.id','<>',Auth::user()->id)
            ->where('usuarios.id','<>',13)
            ->whereIn('usuarioempresas.id_empresa',$id_empresas);

        if($nombre != '')
        {
            $usuarios_set = $usuarios_set->where(DB::raw("CONCAT(usu_nombre, ' ',usu_segnombre,' ',usu_appaterno,' ',usu_apmaterno)"), 'LiKE','%'.$nombre.'%');
        }
        
        if($direccion != '')
        {
            $usuarios_set = $usuarios_set->where(DB::raw("CONCAT(dir_calle, ' ',dir_numero,' ',com_nombre,' ',reg_nombre,' ',pai_nombre)"), 'LiKE','%'.$direccion.'%');
        }

        if($rut != '')
        {
            $usuarios_set = $usuarios_set->where('usuarios.usu_rut','LIKE','%'.$rut.'%');
        }
        if($correo != '')
        {
            $usuarios_set = $usuarios_set->where('usuarios.email','LIKE','%'.$correo.'%');
        }
        if($telefono != '')
        {
            $usuarios_set = $usuarios_set->where('usuarios.usu_telefono','LIKE','%'.$telefono.'%');
        }
        

        $usuarios_rs = $usuarios_set
                ->select('usuarios.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero')
                ->get();

        return Datatables::of($usuarios_rs)

        ->editColumn('rut', function ($usuarios_rs) { 
            
            return "<small style='font-size:11px;'>".$usuarios_rs->usu_rut."</small>"; })

        ->editColumn('imagen', function ($usuarios_rs) {
            
            return '<img src="'.$usuarios_rs->usu_imagen.'"class="rounded-circle" width="40"/>'; })

        ->editColumn('nombre', function ($usuarios_rs) { 
            
           return "<small class='text-muted' style='font-size:11px;'>".$usuarios_rs->usu_nombre.' '.$usuarios_rs->usu_appaterno.' '.$usuarios_rs->usu_apmaterno."</small>";
        })

        ->editColumn('direccion', function ($usuarios_rs) { 
            
            return "<small class='text-muted' style='font-size:11px;'>".$usuarios_rs->dir_calle."  #".$usuarios_rs->dir_numero." , ".$usuarios_rs->com_nombre." , ".$usuarios_rs->reg_nombre." , ".$usuarios_rs->pai_nombre."</small>"; 
            
        })

        ->editColumn('correo', function ($usuarios_rs) { 
            
            return "<small class='text-muted' style='font-size:11px;'>".$usuarios_rs->email."</small>"; 
            
        })

        ->editColumn('telefono', function ($usuarios_rs) { 
            
            return "<small class='text-muted' style='font-size:11px;'>".$usuarios_rs->usu_telefono."</small>"; 
            
        })

        ->editColumn('estado', function ($usuarios_rs) { 
            
            switch((int)$usuarios_rs->usu_estado)
            {
            case 1:
                return '<span class="badge bg-success">Habilitado</span>';
                break;
            case 0:
                return '<span class="badge bg-danger">Deshabilitado</span>';
                break;
            default:
                return "Otros";
                break;
            
            }
    
        })

        ->editColumn('acciones', function ($usuarios_rs) { 
            
            if($usuarios_rs->usu_estado > 0)
            {
                $estado = '<a type="buttom" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#danger-header-modal"  onclick="pro_delete('.$usuarios_rs->id.')">Deshabilitar</a></div></div>';
            }
            else
            {
                $estado = '<a type="buttom" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#success-header-modal"  onclick="pro_enable('.$usuarios_rs->id.')">Habilitar</a></div></div>';
            }

            return '<div class="btn-group"><button type="button" class="btn waves-effect waves-dark btn-orange text-white dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-setting"><i class="fas fa-cog"></i><div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting"></button><div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting"><a type="buttom" class="dropdown-item" onclick="show('.$usuarios_rs->id.')">Detalle</a>
            '.$estado;
    
        })

        ->rawColumns(['rut','imagen','nombre','direccion','correo','telefono','estado','acciones'])

        ->make(true);
    }

    public function store(Request $request)
    {
        $this->Response = ['State' => 200];
	
        switch($_SERVER['REQUEST_METHOD'])
            {
                case 'POST':

                    $id_pais = isset($_POST['id_pais']) ? (int)$_POST['id_pais'] : 0;
                    $id_region = isset($_POST['id_region']) ? (int)$_POST['id_region'] : 0;
                    $id_comuna = isset($_POST['id_comuna']) ? (int)$_POST['id_comuna'] : 0;
                    $usu_nombre = isset($_POST['usu_nombre']) ? trim($_POST['usu_nombre']) : null;
                    $usu_rut = isset($_POST['usu_rut']) ? trim($_POST['usu_rut']) : null;
                    $usu_segnombre = isset($_POST['usu_segnombre']) ? trim($_POST['usu_segnombre']) : null;
                    $usu_appaterno = isset($_POST['usu_appaterno']) ? trim($_POST['usu_appaterno']) : null;
                    $usu_apmaterno = isset($_POST['usu_apmaterno']) ? trim($_POST['usu_apmaterno']) : null;
                    $usu_username = isset($_POST['username']) ? trim($_POST['username']) : null;

                    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
                    $passwordre = isset($_POST['passwordre']) ? trim($_POST['passwordre']) : null;
                    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
                    $usu_calle = isset($_POST['usu_calle']) ? trim($_POST['usu_calle']) : null;
                    $usu_numcalle = isset($_POST['usu_numcalle']) ? trim($_POST['usu_numcalle']) : null;
                    $usu_telefono = isset($_POST['usu_telefono']) ? trim($_POST['usu_telefono']) : "";

                    $dir_tipo = isset($_POST['dir_tipo']) ? (int)$_POST['dir_tipo'] : 0;
                    $id_rol = isset($_POST['id_rol']) ? (int)$_POST['id_rol'] : 0;
                    $id_empresa = isset($_POST['id_empresa']) ? (int)$_POST['id_empresa'] : 0;

                    $usu_numoficina = isset($_POST['usu_numoficina']) ? trim($_POST['usu_numoficina']) : null;

                    $id = isset($_POST['usu_id']) ? (int)$_POST['usu_id'] : 0;

                    if(is_null($usu_nombre))
                    {
                        $this->Response['Message'] = 'Debe ingresar el nombre';
                        $this->Response['State'] = 401;
                        break;
                    }

                    if(is_null($usu_rut))
                    {
                        $this->Response['Message'] = 'Debe ingresar el RUT';
                        $this->Response['State'] = 401;
                        break;
                    }

                    if(is_null($usu_appaterno))
                    {
                        $this->Response['Message'] = 'Debe ingresar el apellido paterno';
                        $this->Response['State'] = 401;
                        break;

                    }

                    if(is_null($email))
                    {
                        $this->Response['Message'] = 'Debe ingresar el email';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($id_pais == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar el pais';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($id_region == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar la region';
                        $this->Response['State'] = 401;  
                        break;

                    }

                    if($id_comuna == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar la comuna';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($usu_calle == "")
                    {
                        $this->Response['Message'] = 'Debe ingresar el nombre de la calle';
                        $this->Response['State'] = 401;  
                        break;

                    }

                    if($usu_telefono == "")
                    {
                        $this->Response['Message'] = 'Debe ingresar el numero de telefono';
                        $this->Response['State'] = 401;  
                        break;

                    }

                    if($usu_numcalle == "")
                    {
                        $this->Response['Message'] = 'Debe ingresar el numero de calle';
                        $this->Response['State'] = 401;  
                        break;

                    }

                    if($dir_tipo == 0)
                    {
                        $this->Response['Message'] = 'Debe seleccionar el tipo';
                        $this->Response['State'] = 401;  
                        break;

                    }

                if($id == 0)
                 {
                    if(is_null($password))
                    {
                        $this->Response['Message'] = 'Debe ingresar una contraseña';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if(is_null($passwordre))
                    {
                        $this->Response['Message'] = 'Debe confirmar la contraseña';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if(is_null($usu_username))
                    {
                        $this->Response['Message'] = 'Debe ingresar el username';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($id_empresa == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar la empresa';
                        $this->Response['State'] = 401;  
                        break;

                    }

                    if($password != $passwordre)
                    {
                        $this->Response['Message'] = 'Las contraseñas no son iguales';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($id_rol == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar el rol';
                        $this->Response['State'] = 401;  
                        break;

                    }

                    if (str_contains(trim($_FILES['usu_imagen']['type']),'image'))
                    {
                       
                    }
                    else
                    {
                        $this->Response['Message'] = 'Formato de imagen no valido';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($_FILES['usu_imagen']['error'] > 0)
                    {
                        
                        $this->Response['Message'] = 'Debe ingresar una imagen';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    $check_mail = DB::table('usuarios')
                            ->where('email','=',$email)
                            ->first();

                    $check_rut = DB::table('usuarios')
                            ->where('usu_rut','=',$usu_rut)
                            ->first();

                    $check_username = DB::table('usuarios')
                            ->where('usu_username',$usu_username)
                            ->first();

                    if(!is_null($check_username))
                    {
                        $this->Response['Message'] = 'El Username ya esta registrado';
                        $this->Response['State'] = 403;  
                        break;
                    }
                            
                    if(!is_null($check_mail))
                    {
                        $this->Response['Message'] = 'El Email ya esta registrado';
                        $this->Response['State'] = 403;  
                        break;
                    }

                    if(!is_null($check_rut))
                    {
                        $this->Response['Message'] = 'El Rut ya esta registrado';
                        $this->Response['State'] = 403;  
                        break;
                    } 

                    $direccion = new Direccion();

                    $direccion->id_comuna = $id_comuna;
                    $direccion->dir_calle = $usu_calle;
                    $direccion->dir_numero = $usu_numcalle;
                    $direccion->dir_depto = $usu_numoficina;

                    
                    $direccion->save();
                    
                    $usuario = new Usuario();

                    $usuario->usu_nombre    = $usu_nombre;
                    $usuario->usu_nombre    = $usu_nombre;
                    $usuario->usu_appaterno = $usu_appaterno;
                    $usuario->usu_apmaterno = $usu_apmaterno;
                    $usuario->usu_segnombre = $usu_segnombre;
                    $usuario->usu_username = $usu_username;
                    $usuario->password      = Hash::make($password);
                    $usuario->email         = $email;
                    $usuario->usu_rut       = $usu_rut;
                    $usuario->usu_telefono  = $usu_telefono;
                    $usuario->id_direccion  = $direccion->id;

                    $img = $request->file('usu_imagen')->store('imagenes/usuarios','public');
    
                    $usuario->usu_imagen = url("storage/".$img);

                    $images = Image::make(Storage::get($img))
                            ->widen(600)
                            ->limitColors(255)
                            ->encode();

                    $usuario->save();

                    Storage::put($img, (string)$images);

                    $usuempresa = new Usuariosempresa();

                    $usuempresa->id_usuario = $usuario->id;
                    $usuempresa->id_empresa = $id_empresa;

                    $usuempresa->save();

                    $emp_nombre = DB::table('empresas')->where('id',$id_empresa)->select('empresas.emp_nombre')->first();

                    $log = new Log();

                    $log->log_accion = "Crea el usuario ".$usuario->usu_nombre." ".$usuario->usu_appaterno." en la empresa ".$emp_nombre->emp_nombre;
                    $log->log_ruta = "usuarios.store";
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    DB::table('usuarioroles')->insert([
                        'id_usuario' => $usuario->id,
                        'id_rol'    => $id_rol
                    ]);

                    $this->Response['Message'] = 'Usuario creado correctamente!.';
                    break;
                }
                else
                {
                    $check_mail = DB::table('usuarios')
                            ->where('email','=',$email)
                            ->where('id','NOT', $id )
                            ->first();

                    $check_rut = DB::table('usuarios')
                            ->where('usu_rut','=',$usu_rut)
                            ->where('id','NOT', $id)
                            ->first();
                    
                    if(!is_null($check_mail))
                    {
                        $this->Response['Message'] = 'El Email ya esta registrado';
                        $this->Response['State'] = 403;  
                        break;
                    }

                    if(!is_null($check_rut))
                    {
                        $this->Response['Message'] = 'El Rut ya esta registrado';
                        $this->Response['State'] = 403;  
                        break;
                    }

                    $usuario = Usuario::find($id);
                    
                    $usuario->usu_nombre   = $usu_nombre;
                    $usuario->usu_appaterno = $usu_appaterno;
                    $usuario->usu_apmaterno = $usu_apmaterno;
                    $usuario->usu_segnombre = $usu_segnombre;
                    $usuario->email        = $email;
                    $usuario->usu_rut      = $usu_rut;
                    $usuario->usu_telefono = $usu_telefono;

                    $direccion = Direccion::find($usuario->id_direccion);

                    $direccion->id_comuna= $id_comuna;
                    $direccion->dir_calle= $usu_calle;
                    $direccion->dir_numero = $usu_numcalle;
                    $direccion->dir_depto= $usu_numoficina;

                    $direccion->save();

                    if($_FILES['usu_imagen']['error'] > 0)
                    {
                    
                    }
                    else
                    {   
                        if (str_contains(trim($_FILES['usu_imagen']['type']),'image'))
                        {  
                            
                            Storage::delete($usuario->usu_imagen);

                            $img = $request->file('usu_imagen')->store('imagenes/usuarios','public');
    
                            $usuario->usu_imagen = url("storage/".$img);

                            $images = Image::make(Storage::disk('public')->get($img))
                            ->widen(600)
                            ->limitColors(255)
                            ->encode();

                            Storage::put($img, (string)$images);

                        }
                        else
                        {
                            $this->Response['Message'] = 'Formato de imagen no valido';
                            $this->Response['State'] = 401;  
                            break;
                        }
                    }

                    if(is_null($usuario->usu_token))
                    {
                        $token = $usuario->createToken("auth_token")->plainTextToken;
                        $usuario->usu_token = $token;
                    }
                                    
                    $usuario->save();

                    $emp_nombre = DB::table('empresas')->where('id',$id_empresa)->select('empresas.emp_nombre')->first();

                    $log = new Log();

                    $log->log_accion = "Modifica el usuario ".$usuario->usu_nombre." en la empresa ".$emp_nombre->emp_nombre;
                    $log->log_ruta = "usuarios.store";
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    $this->Response['Message'] = 'Usuario editado correctamente!.';
                    break;

                }

                default:

                $this->Response['status'] = 0;
                $this->Response['Message'] = 'Methodo no definido';
                break;

            }

        return response()->json($this->Response);

    }

    public function show($id)
    {
        $usuario  = DB::table('usuarios')
                    ->join('direcciones','usuarios.id_direccion','=','direcciones.id')
                    ->join('comunas','direcciones.id_comuna','=','comunas.id')
                    ->join('regiones','comunas.id_region','=','regiones.id')
                    ->join('paises','regiones.id_pais','=','paises.id')  
                    ->join('usuarioroles','usuarioroles.id_usuario','=','usuarios.id')
                    ->join('roles','roles.id','=','usuarioroles.id_rol')
                    ->where ('usuarios.id',$id)
                    ->select('usuarios.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero','direcciones.dir_depto','usuarioroles.id_rol','usuarioroles.id_rol','roles.rol_nombre','paises.pai_nombre','direcciones.id_comuna','comunas.id_region','comunas.com_nombre','regiones.reg_nombre')
                    ->selectRaw('paises.id as id_pais')
                    ->first();
        
        $rolusuario = DB::table('usuarioroles')->join('roles','usuarioroles.id_rol','=','roles.id')->where('usuarioroles.id_usuario',$id)->first();

        $usuemp = DB::table('usuarioempresas')
                    ->join('empresas','usuarioempresas.id_empresa','=','empresas.id')
                    ->where('empresas.emp_estado',1)
                    ->where('usuarioempresas.id_usuario',$id)
                    ->get();

        $logs = DB::table('logs')->where('id_usuario',$id)->orderBy('id','Desc')->get();
  
        $pais = Paises::all();
        


        return view('usuario.show', compact('usuario','pais','rolusuario','usuemp','logs'));
    }

    public function delete()
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $usuario = Usuario::where('id',$id)->first();

        $usuario->usu_estado = 0;
        $usuario->save();

        $log = new Log();

        $log->log_accion = "Deshabilita el usuario :".$usuario->usu_nombre." ".$usuario->usu_appaterno;
        $log->log_ruta = "usuarios.delete";
        $log->id_usuario = Auth::user()->id;
        $log->save();

        $estado = true;

        return ['res'=>$estado];
    }

    public function enable()
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $usuario = Usuario::where('id',$id)->first();

        $usuario->usu_estado = 1;
        $usuario->save();

        $log = new Log();

        $log->log_accion = "Habilita el usuario".$usuario->usu_nombre." ".$usuario->usu_appaterno;
        $log->log_ruta = "usuarios.enable";
        $log->id_usuario = Auth::user()->id;
        $log->save();

        $estado = true;

        return ['res'=>$estado];
    }

    public function resetacces()
    {
        $this->Response = ['State' => 200];

        switch($_SERVER['REQUEST_METHOD'])
            {
                case 'POST':

                    $id_rol = isset($_POST['id_rol']) ? (int)$_POST['id_rol'] : 0;
                    $id_empresa = isset($_POST['id_empresa']) ? (int)$_POST['id_empresa'] : 0;
                    $usu_username = isset($_POST['username']) ? trim($_POST['username']) : null;

                    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
                    $passwordre = isset($_POST['passwordre']) ? trim($_POST['passwordre']) : null;
                    $id = isset($_POST['usu_id']) ? (int)$_POST['usu_id'] : 0;

                    if(is_null($password))
                    {
                        $this->Response['Message'] = 'Debe ingresar una contraseña';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if(is_null($passwordre))
                    {
                        $this->Response['Message'] = 'Debe confirmar la contraseña';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if(is_null($usu_username))
                    {
                        $this->Response['Message'] = 'Debe ingresar el username';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($id_empresa == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar la empresa';
                        $this->Response['State'] = 401;  
                        break;

                    }

                    if($password != $passwordre)
                    {
                        $this->Response['Message'] = 'Las contraseñas no son iguales';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($id_rol == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar el rol';
                        $this->Response['State'] = 401;  
                        break;

                    }
                    $check_username = DB::table('usuarios')
                    ->where('usu_username',$usu_username)
                    ->where('usuarios.id','<>',$id)
                    ->first();

                    if(!is_null($check_username))
                    {
                        $this->Response['Message'] = 'El Username ya esta registrado';
                        $this->Response['State'] = 403;  
                        break;
                    }

                    $usuario = Usuario::find($id);

                    $usuario->password      = Hash::make($password);
                    $usuario->usu_username = $usu_username;
                    
                    $usuempresa = Usuariosempresa::where('id_usuario',$usuario->id)->first();

                    $usuempresa->id_empresa = $id_empresa;
                    $usuempresa->save();
                                    
                    $usuario->save();

                    DB::table('usuarioroles')->where('id_usuario',$usuario->id)->update([
                        'id_rol' => $id_rol
                    ]);

                    $log = new Log();

                    $log->log_accion = "Modifica las credenciales del usuario ".$usuario->usu_nombre;
                    $log->log_ruta = "usuarios.show";
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    $this->Response['Message'] = 'Credenciales modificadas correctamente!';
                       
                break;

                default:

                    $this->Response['status'] = 0;
                    $this->Response['Message'] = 'Methodo no definido';
                break;

            }

        return response()->json($this->Response);
    }
}
