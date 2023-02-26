<?php

namespace App\Http\Controllers;

use App\Models\Autoatencione;
use App\Models\Categoria;
use App\Models\Cotizacione;
use App\Models\Direccion;
use App\Models\Empresa;
use App\Models\Landing;
use App\Models\Log;
use App\Models\Metododepago;
use App\Models\Paises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class EmpresaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $empresas = DB::table('empresas')
        ->join('direcciones','empresas.id_direccion','=','direcciones.id')
        ->join('comunas','direcciones.id_comuna','=','comunas.id')
        ->join('regiones','comunas.id_region','=','regiones.id')
        ->join('paises','regiones.id_pais','=','paises.id')
        ->select('empresas.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero')
        ->paginate(20);

        $empresa = new Empresa();
        $pais = Paises::where('id','<>',0)->get();

        $metododepagos = Metododepago::where('met_estado',1)->get();
        $plataformas = DB::table('plataformas')->where('pla_estado',1)->get();

        return view('empresa.index', compact('empresas','empresa','pais','metododepagos','plataformas'))
            ->with('i', (request()->input('page', 1) - 1) * $empresas->perPage());

    }

    public function store(Request $request)
    {

        $this->Response = ['State' => 200];

        switch($_SERVER['REQUEST_METHOD'])
        {
            
            case 'POST':

                $emp_nombre = isset($_POST['emp_nombre']) ? trim($_POST['emp_nombre']) : '';
              
                $emp_giro = isset($_POST['emp_giro']) ? trim($_POST['emp_giro']) : '';
                $emp_rut = isset($_POST['emp_rut']) ? trim($_POST['emp_rut']) : '';
                $emp_telefono = isset($_POST['emp_telefono']) ? trim($_POST['emp_telefono']) : '';
                $emp_mail = isset($_POST['emp_mail']) ? trim($_POST['emp_mail']) : '';
                $emp_numcalle = isset($_POST['emp_numcalle']) ? trim($_POST['emp_numcalle']) : '';
                $emp_contacto = isset($_POST['emp_contacto']) ? trim($_POST['emp_contacto']) : '';

                $id_pais = isset($_POST['id_pais']) ? (int)$_POST['id_pais'] : 0;
                $id_region = isset($_POST['id_region']) ? (int)$_POST['id_region'] : 0;
                $id_comuna = isset($_POST['id_comuna']) ? (int)$_POST['id_comuna'] : 0;
                $emp_tipo = isset($_POST['emp_tipo']) ? (int)$_POST['emp_tipo'] : 0;
                $emp_calle = isset($_POST['emp_calle']) ? trim($_POST['emp_calle']) : '';

                $emp_padre = count(EmpresasUser(Auth::user()->id)) > 1 ? 9 : 0;
                            
                $id = isset($_POST['emp_id']) ? (int)$_POST['emp_id'] : 0;

                $emp = Empresa::find($id);

                $direccion = new Direccion();
                $empresa = new Empresa();


                $check_nombre = Empresa::where('emp_nombre','like',$emp_nombre)->first();
                $check_rut = Empresa::where('emp_rut','like',$emp_rut)->first();
                
                if(is_null($emp_telefono) || $emp_telefono == '')
                {
                    $this->Response['Message'] = 'Debe ingresar el Telefono';
                    $this->Response['State'] = 401;
                    break;
                }
                if(is_null($emp_mail) || $emp_mail == '')
                {
                    $this->Response['Message'] = 'Debe ingresar el Correo Electronico';
                    $this->Response['State'] = 401;
                    break;
                }
                if(is_null($emp_contacto) || $emp_contacto == '')
                {
                    $this->Response['Message'] = 'Debe ingresar el Contacto';
                    $this->Response['State'] = 401;
                    break;
                }

                if (str_contains(trim($_FILES['emp_logo']['type']),'image'))
                {
                    
                }
                else
                {
                    $this->Response['Message'] = 'Formato de imagen no valido';
                    $this->Response['State'] = 401;  
                    break;
                }

                if($emp_tipo != 2)
                {
                    if(is_null($emp_nombre) || $emp_nombre == '')
                    {
                        $this->Response['Message'] = 'Debes ingresar la razón social';
                        $this->Response['State'] = 401;
                        break;
                    }

                    
                    if(is_null($emp_rut) || $emp_rut == '')
                    {
                        $this->Response['Message'] = 'Debe ingresar el RUT';
                        $this->Response['State'] = 401;
                        break;
                    }
                    if(is_null($emp_giro) || $emp_giro == '')
                    {
                        $this->Response['Message'] = 'Debe ingresar el Giro';
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
                    if($emp_tipo == 0 && is_null($emp))
                    {
                        $this->Response['Message'] = 'Debe ingresar el tipo de empresa';
                        $this->Response['State'] = 401;  
                        break;

                    }

                    if($id_comuna == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar la comuna';
                        $this->Response['State'] = 401;  
                        break;
                    }
                    if($emp_calle == "")
                    {
                        $this->Response['Message'] = 'Debe ingresar el nombre de la calle';
                        $this->Response['State'] = 401;  
                        break;

                    }
                    if($emp_numcalle == "")
                    {
                        $this->Response['Message'] = 'Debe ingresar el numero de la calle';
                        $this->Response['State'] = 401;  
                        break;

                    }
                }
                if(is_null($emp))
                {
                    if($emp_tipo != 2)
                    {
                        if(is_null($check_nombre))
                        {
        
                        }
                        else
                        {
                            if(trim($check_nombre->emp_nombre) == $emp_nombre)
                            {
                                $this->Response['Message'] = 'La razón social ya esta registrada';
                                $this->Response['State'] = 401;
                                break;
                            }
                        }

                        if(is_null($check_rut))
                        {
        
                        }
                        else
                        {
                            if(trim($check_rut->emp_rut) == $emp_rut)
                            {
                                $this->Response['Message'] = 'El rut ya se encuentra registrado';
                                $this->Response['State'] = 401;
                                break;
                            }
                        }
                    }

                    $direccion->id_comuna   = $id_comuna;
                    $direccion->dir_calle   = $emp_calle;
                    $direccion->dir_numero  = $emp_numcalle;

                    $direccion->save();

                    $img = $request->file('emp_logo')->store('imagenes/Empresas/','public');
                    $empresa->emp_logo = $img;

                    $images = Image::make(Storage::get($empresa->emp_logo))
                            ->widen(600)
                            ->limitColors(255)
                            ->encode();

                    Storage::put($empresa->emp_logo, (string)$images);

                    $empresa->emp_nombre    = $emp_nombre;      
                    $empresa->emp_rut       = $emp_rut;
                    $empresa->emp_giro      = $emp_giro;
                    $empresa->emp_contacto  = $emp_contacto;
                    $empresa->emp_mail      = $emp_mail;
                    $empresa->emp_tipo      = $emp_tipo;
                    $empresa->emp_padre     = $emp_padre;
                    $empresa->emp_telefono  = $emp_telefono;
                    $empresa->id_direccion  = $direccion->id;

                    $empresa->save();

                    $log = new Log();

                    $log->log_accion = "Crea la empresa ID :".$empresa->id;
                    $log->log_ruta = "empresas.store";
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    $this->Response['Message'] = 'Empresa creado correctamente!.';
                    break;

                }
                else
                {
                   $dir = Direccion::where('id',$emp->id_direccion)->first();
                    
                    $dir->id_comuna  =   $id_comuna;
                    $dir->dir_calle  =   $emp_calle;
                    $dir->dir_numero =   $emp_numcalle;

                    $img = $request->file('emp_logo')->store('imagenes/Empresas/','public');
                    $emp->emp_logo = $img;

                    $images = Image::make(Storage::get($emp->emp_logo))
                            ->widen(600)
                            ->limitColors(255)
                            ->encode();

                    Storage::put($emp->emp_logo, (string)$images);

                    $emp->emp_nombre    =   $emp_nombre;
                    $emp->emp_rut       =   $emp_rut;
                    $emp->emp_giro      =   $emp_giro;
                    $emp->emp_contacto  =   $emp_contacto;
                    $emp->emp_tipo      =   $emp_tipo;
                    $emp->emp_mail      =   $emp_mail;
                    $emp->emp_telefono  =   $emp_telefono;

                    $emp->save();

                    $log = new Log();

                    $log->log_accion = "Modifica la empresa ID :".$emp->id;
                    $log->log_ruta = "empresas.store";
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    $this->Response['Message'] = 'Empresa editado correctamente!.';
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
        $empresa  = DB::table('empresas')
        ->join('direcciones','empresas.id_direccion','=','direcciones.id')
        ->join('comunas','direcciones.id_comuna','=','comunas.id')
        ->join('regiones','comunas.id_region','=','regiones.id')
        ->join('paises','regiones.id_pais','=','paises.id')  
        ->where('empresas.id',$id)
        ->select('empresas.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero','direcciones.dir_depto')
        ->first();

        $clientes = DB::table('empresaclientes')
        ->join('clientes','empresaclientes.id_cliente','=','clientes.id')
        ->where('id_empresa',$id)
        ->select('clientes.*')
        ->get();

        $count = [

            "ecommer" => 0,
            "landing" => 0,
            "minicommer" => 0,
            "menu" =>0,
        ];

        $cotizaciones = Cotizacione::join('usuarios','cotizaciones.id_usuario','=','usuarios.id')
        ->where('cot_estado','<>',4)
        ->where('id_empresa',$id)
        ->select('cotizaciones.*','usuarios.usu_nombre','usuarios.usu_appaterno')
        ->get();

        $pais = Paises::all();  

        return view('empresa.show', compact('empresa','pais','clientes','cotizaciones','count')); 
    
    }

    public function cotizacion($id)
    {
        $empresa  = DB::table('empresas')
        ->join('direcciones','empresas.id_direccion','=','direcciones.id')
        ->join('comunas','direcciones.id_comuna','=','comunas.id')
        ->join('regiones','comunas.id_region','=','regiones.id')
        ->join('paises','regiones.id_pais','=','paises.id')  
        ->where('empresas.id',$id)
        ->select('empresas.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero','direcciones.dir_depto')
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
                    ->where('id_empresa',$id)
                    ->first();

        if(!is_null($cotizacion))
        {
            $productos = DB::table('productos')
            ->join('cotizacionproducto','productos.id','=','cotizacionproducto.id_producto')
            ->where('productos.pro_estado',1)
            ->where('cotizacionproducto.id_cotizacion',$cotizacion->id)
            ->select('productos.pro_neto','productos.pro_bruto','productos.pro_nombre','productos.pro_exento','productos.pro_int_esp','cotizacionproducto.id','cotizacionproducto.cop_cantidad','cotizacionproducto.cop_descuento','cotizacionproducto.cop_destipo')
            ->get();
        }

        if(count($id_empresas) > 1)
        {
            $categorias = Categoria::whereIn('cat_padres',['0'])->where('id_empresa',9)->get();
        }
        else
        {
            $categorias = Categoria::whereIn('cat_padre',['0'])->where('id_empresa',$id_empresas)->get();
        }

        $pais = Paises::where('id','<>',0)->get();

        return view('empresa.cotizacion', compact('empresa','pais','categorias','cotizacion','productos'));
    }

    public function ajax()
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            
            case 'POST':

                $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

                $empresa = Empresa::find($id);

                return ['res' => $empresa];

                break;

            default:
                
                $res = 0;
                return ['res' => $res];

            break;

        }
    }

    public function status()
    {
        $this->Response['State'] = 200;

        switch($_SERVER['REQUEST_METHOD'])
        {
            
            case 'POST':

                $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
                $emp_tipo = isset($_POST['emp_tipo']) ? (int)$_POST['emp_tipo'] : 0;

                $empresa = Empresa::find($id);

                if($emp_tipo == 0)
                {
                    $this->Response['State'] = 401;
                    $this->Response['Message'] = 'Desbes seleccionar el tipo!.';
                }

                $empresa->emp_tipo = $emp_tipo;
                $empresa->save();

                $log = new Log();

                $log->log_accion = "Cambia el estado de la empresa ID:".$empresa->id;
                $log->log_ruta = "cotizacion.estado";
                $log->id_usuario = Auth::user()->id;
                $log->save();

                $this->Response['Message'] = 'Empresa editada correctamente!.';
                break;

            default:

                $this->Response['State'] = 0;
                $this->Response['Message'] = 'Methodo no definido';

            break;

        }

        return response()->json($this->Response);

    }

    public function delete()
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $empresa = Empresa::where('id',$id)->first();

        $empresa->emp_estado = 0;
        $empresa->save();
        $log = new Log();

        $log->log_accion = "Deshabilita la empresa ID".$empresa->id;
        $log->log_ruta = "cotizacion.delete";
        $log->id_usuario = Auth::user()->id;
        $log->save();

        $estado = true;

        return ['res'=>$estado];
    }

    public function enable()
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $empresa = Empresa::where('id',$id)->first();

        $empresa->emp_estado = 1;
        $empresa->save();

        $log = new Log();

        $log->log_accion = "Habilita empresa ID :".$empresa->id;
        $log->log_ruta = "cotizaciones.enable";
        $log->id_usuario = Auth::user()->id;
        $log->save();

        $estado = true;

        return ['res'=>$estado];
    }

    public function ajax_empmetpago()
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'POST':

                $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

                $metododepagos = Metododepago::leftjoin('empmetpago','empmetpago.id_metododepago','=','metododepagos.id')
                ->where('met_estado',1)
                ->where('id_empresa',$id)
                ->where('empmetpago.estado',1)
                ->select('metododepagos.*','empmetpago.estado','empmetpago.id_empresa')
                ->get();

                return  $metododepagos;

                break;

            default:
                
                $res = 0;
                return ['res' => $res];

            break;

        }
    }

    public function empmetpago(Request $request)
    {
        $this->Response['State'] = 200;

            switch($_SERVER['REQUEST_METHOD'])
            {
                
                case 'POST':

                $id_metodos = isset($_POST['id_metodos']) ? $_POST['id_metodos'] : [];
                $id_empresa = isset($_POST['id_empresa']) ? (int)$_POST['id_empresa'] : 0;

                //revisa los metodos de pagos de la empresa activos
                $check_met_activos = DB::table('empmetpago')->where('id_empresa',$id_empresa)->where('estado',1)->get('id_metododepago');
                $check_met_inactivos = DB::table('empmetpago')->where('id_empresa',$id_empresa)->where('estado',0)->get('id_metododepago');

                $met_dif_vistas = [];
                $met_dif_vistas = [];
            
                $check_met_activos = array_column($check_met_activos->toArray(),'id_metododepago');
                $check_met_inactivos = array_column($check_met_inactivos->toArray(),'id_metododepago');

                $id_metodos = array_keys($id_metodos);

                $met_dif_vistas = array_diff($id_metodos,$check_met_activos,$check_met_inactivos);
                $met_dif_tablas = array_diff($check_met_activos,$id_metodos);

                if(count($id_metodos)> 0)
                {
                    if(count($met_dif_tablas)>0)
                    {
                        foreach($met_dif_tablas as $key)
                        {
                            DB::table('empmetpago')->where('id_metododepago',$key)->where('id_empresa',$id_empresa)->update([
                                'estado' => 0
                            ]);
                        }
                    }
                    if(count($met_dif_vistas)>0)
                    {
                        foreach($met_dif_vistas as $key)
                        {
                            DB::table('empmetpago')->insert([
                                'id_metododepago' => $key,
                                'id_empresa' => $id_empresa
                            ]);
                        }
                    } 
                    else
                    {
                        foreach($id_metodos as $key)
                        {
                            foreach($check_met_inactivos as $ina)
                            {
                                if($key == $ina)
                                {
                                    DB::table('empmetpago')->where('id_empresa',$id_empresa)->where('id_metododepago',$key)->update([
                                        'estado' => 1
                                    ]);
                                }
                            }
                        }
                    }
                }
                else
                {
                    DB::table('empmetpago')->where('id_empresa',$id_empresa)->update([
                        'estado' => 0
                    ]);
                }
                
                $log = new Log();
                $empresa = Empresa::find($id_empresa);

                $log->log_accion = "Modifica los metodos de pago de la empresa :".$empresa->emp_nombre;
                $log->log_ruta = $request->url();
                $log->id_usuario = Auth::user()->id;
                $log->save();

                $this->Response['Message'] = 'Se asignaron los medotos de pagos correctamente!.';
                break;

                default:

                $this->Response['State'] = 0;
                $this->Response['Message'] = 'Methodo no definido';
                break;

            }   

        return response()->json($this->Response);

    }

}
