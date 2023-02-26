<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Paises;
use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\Direccion;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
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

        $clientes = DB::table('clientes')
                    ->join('empresaclientes','clientes.id','=','empresaclientes.id_cliente')
                    ->join('direcciones','clientes.id_direccion','=','direcciones.id')
                    ->join('comunas','direcciones.id_comuna','=','comunas.id')
                    ->join('regiones','comunas.id_region','=','regiones.id')
                    ->join('paises','regiones.id_pais','=','paises.id')
                    ->whereIn('empresaclientes.id_empresa',$id_empresas)
                    ->select('clientes.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero')
                    ->paginate(20);

        $cliente = new Cliente();
        $pais = Paises::all();

        return view('cliente.index', compact('clientes','cliente','pais'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    public function store(Request $request)
    {

        $this->Response = ['State' => 200];

        switch($_SERVER['REQUEST_METHOD'])
        {
            
            case 'POST':

                $cli_nombre = isset($_POST['cli_nombre']) ? trim($_POST['cli_nombre']) : '';
                $cli_nomfanta = isset($_POST['cli_nomfanta']) ? trim($_POST['cli_nomfanta']) : '';
                $cli_giro = isset($_POST['cli_giro']) ? trim($_POST['cli_giro']) : '';
                $cli_rut = isset($_POST['cli_rut']) ? trim($_POST['cli_rut']) : '';
                $cli_telefono = isset($_POST['cli_telefono']) ? trim($_POST['cli_telefono']) : '';
                $cli_mail = isset($_POST['cli_mail']) ? trim($_POST['cli_mail']) : '';
                $cli_numcalle = isset($_POST['cli_numcalle']) ? trim($_POST['cli_numcalle']) : '';

                $id_pais = isset($_POST['id_pais']) ? (int)$_POST['id_pais'] : 0;
                $cli_tipo = isset($_POST['cli_tipo']) ? (int)$_POST['cli_tipo'] : 0;
                $id_region = isset($_POST['id_region']) ? (int)$_POST['id_region'] : 0;
                $id_comuna = isset($_POST['id_comuna']) ? (int)$_POST['id_comuna'] : 0;
                $cli_calle = isset($_POST['cli_calle']) ? trim($_POST['cli_calle']) : '';


                $id = isset($_POST['cli_id']) ? (int)$_POST['cli_id'] : 0;

                $cli = Cliente::find($id);

                $direccion = new Direccion();
                $cliente = new Cliente();

                $check_nombre = Cliente::where('cli_nombre','like',$cli_nombre)->first();
                $check_rut = Cliente::where('cli_rut','like',$cli_rut)->first();

                if(is_null($cli_nombre) || $cli_nombre == '')
                {
                    $this->Response['Message'] = 'Debes ingresar la razón social';
                    $this->Response['State'] = 401;
                    break;
                }

                
                if(is_null($cli_rut) || $cli_rut == '')
                {
                    $this->Response['Message'] = 'Debe ingresar el RUT';
                    $this->Response['State'] = 401;
                    break;
                }
                if(is_null($cli_giro) || $cli_giro == '')
                {
                    $this->Response['Message'] = 'Debe ingresar el Giro';
                    $this->Response['State'] = 401;
                    break;
                }
                if(is_null($cli_telefono) || $cli_telefono == '')
                {
                    $this->Response['Message'] = 'Debe ingresar el Telefono';
                    $this->Response['State'] = 401;
                    break;
                }
                if(is_null($cli_nomfanta) || $cli_nomfanta == '')
                {
                    $this->Response['Message'] = 'Debe ingresar el nombre de fantasía';
                    $this->Response['State'] = 401;
                    break;
                }
                if(is_null($cli_mail) || $cli_mail == '')
                {
                    $this->Response['Message'] = 'Debe ingresar el Correo Electronico';
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
                if($cli_tipo == 0)
                {
                    $this->Response['Message'] = 'Debe ingresar el tipo cliente';
                    $this->Response['State'] = 401;  
                    break;
                }
                if($cli_calle == "")
                {
                    $this->Response['Message'] = 'Debe ingresar el nombre de la calle';
                    $this->Response['State'] = 401;  
                    break;

                }
                if($cli_numcalle == "")
                {
                    $this->Response['Message'] = 'Debe ingresar el numero de la calle';
                    $this->Response['State'] = 401;  
                    break;

                }
                if(is_null($cli))
                {
                    $check_mail = Cliente::where('cli_mail',$cli_mail)->first();

                    if(!is_null($check_mail))
                    {
                        if(trim($check_mail) == $cli_mail)
                        {
                            $this->Response['Message'] = 'El correo ya se encuentra asociado a un Cliente';
                            $this->Response['State'] = 401;
                            break;
                        }
                    }

                    if(is_null($check_nombre))
                    {
    
                    }
                    else
                    {
                        if(trim($check_nombre->cli_nombre) == $cli_nombre)
                        {
                            $this->Response['Message'] = 'La razón social ya esta registrada';
                            $this->Response['State'] = 401;
                            break;
                        }
                    }

                    $direccion->id_comuna   = $id_comuna;
                    $direccion->dir_calle   = $cli_calle;
                    $direccion->dir_numero  = $cli_numcalle;

                    $direccion->save();

                    $cliente->cli_nombre    = $cli_nombre;      
                    $cliente->cli_rut       = $cli_rut;
                    $cliente->cli_tipo      = $cli_tipo;
                    $cliente->cli_nomfanta  = $cli_nomfanta;
                    $cliente->cli_giro      = $cli_giro;
                    $cliente->cli_mail      = $cli_mail;
                    $cliente->cli_telefono  = $cli_telefono;
                    $cliente->id_direccion  = $direccion->id;

                    $cliente->save();

                    $log = new Log();

                    $log->log_accion = "Crea cliente ".$cliente->cli_nombre;
                    $log->log_ruta = $request->route()->getName();
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    $empresa = DB::table('usuarioempresas')->where('id_usuario',Auth::user()->id)->select()->first();

                    DB::table('empresaclientes')->insert([
                        'id_cliente' => (int)$cliente->id,
                        'id_empresa' => (int)$empresa->id_empresa
                    ]);

                    $this->Response['Message'] = 'Cliente creado correctamente!.';
                    break;

                }
                else
                {
                    $check_mail = Cliente::where('cli_mail',$cli_mail)->where('id','<>',$cli->id)->first();

                    if(!is_null($check_mail))
                    {
                        if(trim($check_mail) == $cli_mail)
                        {
                            $this->Response['Message'] = 'El correo ya se encuentra asociado a un Cliente';
                            $this->Response['State'] = 401;
                            break;
                        }
                    }


                   $dir = Direccion::where('id',$cli->id_direccion)->first();
                    
                    $dir->id_comuna  =   $id_comuna;
                    $dir->dir_calle  =   $cli_calle;
                    $dir->dir_numero =   $cli_numcalle;

                    $cli->cli_nombre    =   $cli_nombre;
                    $cli->cli_rut       =   $cli_rut;
                    $cli->cli_nomfanta  =   $cli_nomfanta;
                    $cli->cli_giro      =   $cli_giro;
                    $cli->cli_mail      =   $cli_mail;
                    $cli->cli_tipo      =   $cli_tipo;
                    $cli->cli_telefono  =   $cli_telefono;

                    $cli->save();
                    $log = new Log();
                    $log->log_accion = "Modifica cliente ".$cli->cli_nombre;
                    $log->log_ruta = $request->route()->getName();
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    $this->Response['Message'] = 'Cliente editado correctamente!.';
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

        $cliente  = DB::table('clientes')
                    ->join('direcciones','clientes.id_direccion','=','direcciones.id')
                    ->join('comunas','direcciones.id_comuna','=','comunas.id')
                    ->join('regiones','comunas.id_region','=','regiones.id')
                    ->join('paises','regiones.id_pais','=','paises.id')  
                    ->where('clientes.id',$id)
                    ->select('clientes.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero','direcciones.dir_depto')
                    ->first();
            
        $cotizaciones = DB::table('cotizaciones')
        ->join('usuarios','cotizaciones.id_usuario','=','usuarios.id')->where('id_cliente',$id)->where('cot_estado','<>',4)->select('cotizaciones.*','usuarios.usu_nombre','usuarios.usu_appaterno')->get();

        $pais = Paises::all();

        return view('cliente.show', compact('cliente','pais','cotizaciones')); 
    }

    public function delete(Request $request)
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $cliente = Cliente::where('id',$id)->first();

        $cliente->cli_estado = 0;
        $cliente->save();
        $log = new Log();

        $log->log_accion = "Deshabilita cliente ".$cliente->cli_nombre;
        $log->log_ruta = $request->route()->getName();
        $log->id_usuario = Auth::user()->id;
        $log->save();

        $estado = true;

        return ['res'=>$estado];
    }

    public function enable(Request $request)
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $cliente = Cliente::where('id',$id)->first();

                $cliente->cli_estado = 1;
                $cliente->save();
                $log = new Log();

                $log->log_accion = "Habilita cliente ".$cliente->cli_nombre;
                $log->log_ruta = $request->route()->getName();
                $log->id_usuario = Auth::user()->id;
                $log->save();

            $estado = true;

        return ['res'=>$estado];
    }
    
    public function ajax()
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            
            case 'POST':

                $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

                $cliente = Cliente::find($id);

                return ['res' => $cliente];

                break;

            default:
                
                $res = 0;
                return ['res' => $res];

            break;

        }
    }

    public function status(Request $request)
    {
        $this->Response['State'] = 200;

        switch($_SERVER['REQUEST_METHOD'])
        {
            
            case 'POST':

                $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
                $cli_tipo = isset($_POST['cli_tipo']) ? (int)$_POST['cli_tipo'] : 0;

                $cliente = Cliente::find($id);

                if($cli_tipo == 0)
                {
                    $this->Response['State'] = 401;
                    $this->Response['Message'] = 'Desbes seleccionar el tipo!.';
                }

                $cliente->cli_tipo = $cli_tipo;
                $cliente->save();
                $log = new Log();

                $log->log_accion = "Cambia el estado del cliente ".$cliente->cli_nombre;
                $log->log_ruta = $request->route()->getName();
                $log->id_usuario = Auth::user()->id;
                $log->save();

                $this->Response['Message'] = 'Cliente editado correctamente!.';
                break;

            default:

                $this->Response['State'] = 0;
                $this->Response['Message'] = 'Methodo no definido';

            break;

        }

        return response()->json($this->Response);

    }

    public function cotizacion($id)
    {
        $cliente  = DB::table('clientes')
        ->join('direcciones','clientes.id_direccion','=','direcciones.id')
        ->join('comunas','direcciones.id_comuna','=','comunas.id')
        ->join('regiones','comunas.id_region','=','regiones.id')
        ->join('paises','regiones.id_pais','=','paises.id')  
        ->where('clientes.id',$id)
        ->select('clientes.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero','direcciones.dir_depto')
        ->first();

        $auth_emp = EmpresasUser(Auth::user()->id);

        $id_empresas = [];
        $productos = [];
        $total = [];
        
        foreach ($auth_emp as $a)
        {
            $id_empresas[] = [
                'id_empresas' => $a->id
            ];
        }   

        $cotizacion = Cotizacione::where('cot_estado',4)
                ->where('id_cliente',$id)
                ->first();

        if(!is_null($cotizacion)){

            $productos = DB::table('productos')
            ->join('cotizacionproducto','productos.id','=','cotizacionproducto.id_producto')
            ->where('productos.pro_estado',1)
            ->where('cotizacionproducto.id_cotizacion',$cotizacion->id)
            ->select('productos.pro_neto','productos.pro_bruto','productos.pro_nombre','productos.pro_exento','productos.pro_int_esp','cotizacionproducto.id','cotizacionproducto.cop_cantidad','cotizacionproducto.cop_descuento','cotizacionproducto.cop_destipo')
            ->get();
        }

        if(count($id_empresas) > 1)
        {
            $categorias = Categoria::where('cat_padre',0)->where('id_empresa',9)->get();
        }
        else
        {
            $categorias = Categoria::where('cat_padre',0)->where('id_empresa',$id_empresas)->get();
        }

        $pais = Paises::where('id','<>',0)->get();

        return view('cliente.cotizacion', compact('cliente','pais','categorias','cotizacion','productos'));
    }

}
