<?php

namespace App\Http\Controllers;

use App\Models\Cantidade;
use App\Models\Direccione;
use App\Models\Paises;
use App\Models\Producto;
use App\Models\Sucursale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SucursaleController extends Controller
{

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

        $pais = Paises::where('id','<>',0)->get();

        
        return view('sucursal.index', compact('pais'));
    }

    public function registros(Request $request)
    {
        if($request->ajax())
        {
            $auth_emp = EmpresasUser(Auth::user()->id);

            $id_empresas = [];
            
            foreach ($auth_emp as $a)
            {
                $id_empresas[] = [
                    'id_empresas' => $a->id
                ];
            }

            if($request->input('id_catfiltro'))
            {
              
            }
            else
            {
                    $sucursales = Sucursale::join('direcciones','direcciones.id','=','sucursales.id_direccion')
                    ->join('comunas','direcciones.id_comuna','=','comunas.id')
                    ->join('regiones','comunas.id_region','=','regiones.id')
                    ->join('paises','regiones.id_pais','=','paises.id')
                    ->whereIN('sucursales.id_empresa',$id_empresas)
                    ->select('sucursales.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero')
                    ->get();
            }
        }
       

        return response()->json([
            'sucursal' => $sucursales
        ]);
    }

    public function store()
    {
        $this->Response = ['status' => 200];

        switch($_SERVER['REQUEST_METHOD'])
            {
                case 'POST':

                    $suc_nombre = isset($_POST['suc_nombre']) ? trim($_POST['suc_nombre']) : '';
                    $suc_tipo = isset($_POST['suc_tipo']) ? (int)$_POST['suc_tipo'] : 0;
                    $suc_calle = isset($_POST['suc_calle']) ? trim($_POST['suc_calle']) : '';
                    $id_comuna = isset($_POST['id_comuna']) ? (int)$_POST['id_comuna'] : 0;
                    $suc_sumcalle = isset($_POST['suc_numcalle']) ? trim($_POST['suc_numcalle']) : '';
                    $dir_tipo = isset($_POST['dir_tipo']) ? trim($_POST['dir_tipo']) : '';
                    $id_pais = isset($_POST['id_pais']) ? (int)$_POST['id_pais'] : 0;
                    $id_region = isset($_POST['id_region']) ? (int)$_POST['id_region'] : 0;
                    $suc_numoficina = isset($_POST['suc_numoficina']) ? trim($_POST['suc_numoficina']) : '';
                    $suc_contacto = isset($_POST['suc_contacto']) ? trim($_POST['suc_contacto']) : '';
                    $suc_numero = isset($_POST['suc_numero']) ? trim($_POST['suc_numero']) : '';
                    $id_empresa = isset($_POST['id_empresa']) ? trim($_POST['id_empresa']) : '';

                    if($suc_numero == '')
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar el telefono de la sucursal.';
                        break;
                    }
                    if($suc_contacto == '')
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar el contacto de la sucursal.';
                        break;
                    }
                    if($suc_nombre == '')
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar el nombre.';
                        break;
                    }
                    if($suc_tipo == 0)
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar el tipo de sucursal.';
                        break;
                    }
                    if($suc_calle == '')
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar la calle.';
                        break;
                    }
                    if($id_comuna == 0)
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar la comuna.';
                        break;
                    }
                    if($suc_sumcalle == '')
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar el numero de calle.';
                        break;
                    }
                    if($dir_tipo == '')
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar si es oficina o no.';
                    }
                    elseif($dir_tipo == 1)
                    {
                        if($suc_numoficina == '')
                        {
                            $this->Response['status'] = 401;
                            $this->Response['Message'] = 'Debes ingresar el numero de oficina.';
                            break;
                        }
                    }
                    
                    if($id_pais == 0)
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar el pais.';
                        break;
                    }
                    if($id_region == 0)
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar la region.';
                        break;
                    }
                   
                    if($id_empresa == 0)
                    {
                        $this->Response['status'] = 401;
                        $this->Response['Message'] = 'Debes ingresar la oficina.';
                        break;
                    }

                    $sucursal = new Sucursale();

                    $direccion = new Direccione();

                    $direccion->id_comuna = $id_comuna;
                    $direccion->dir_calle = $suc_calle;
                    $direccion->dir_numero = $suc_sumcalle;
                    $direccion->dir_depto = $suc_numoficina;
                    $direccion->save();

                    $sucursal->suc_nombre = $suc_nombre;
                    $sucursal->id_empresa = $id_empresa;
                    $sucursal->id_direccion = $direccion->id;
                    $sucursal->suc_contacto = $suc_contacto;
                    $sucursal->suc_tipo = $suc_tipo;
                    $sucursal->save();
 
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
        $sucursal = Sucursale::join('direcciones','direcciones.id','=','sucursales.id_direccion')
                    ->join('comunas','direcciones.id_comuna','=','comunas.id')
                    ->join('regiones','comunas.id_region','=','regiones.id')
                    ->join('paises','regiones.id_pais','=','paises.id')
                    ->join('empresas','empresas.id','=','sucursales.id_empresa')
                    ->where('sucursales.id',$id)
                    ->select('sucursales.*','comunas.com_nombre','regiones.reg_nombre','paises.pai_nombre','direcciones.dir_calle','direcciones.dir_numero','empresas.emp_nombre')
                    ->first();

        $productos = Producto::join('cantidades','cantidades.id_producto','=','productos.id')
                ->where('cantidades.id_sucursal',$id)
                ->select('productos.*','cantidades.sto_cantidad')
                ->get();

        $paises = Paises::all();
        
        return view('sucursal.show', compact('sucursal','paises','productos'))->with('i');
    }

    public function validastock()
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'POST':

                $id_sucursal = isset($_POST['id_suc']) ? (int)$_POST['id_suc'] : 0;
                $id_producto = isset($_POST['id_pro']) ? (int)$_POST['id_pro'] : 0;
                $stock = isset($_POST['stock']) ? (int)$_POST['stock'] : 0;

                $cantidad = Cantidade::Where('id_producto',$id_producto)->where('id_sucursal',$id_sucursal)->first();

                if(!isset($cantidad))
                {
                    return '{"res" : false}';
                }

                if((int)$cantidad->sto_cantidad < $stock)
                {
                    return '{"res" : false}';
                }
                else
                {
                    return '{"res" : true}';
                }
                break;

            default:                
                return '{"res" : false}';

                break;
        }
    }

    public function destroy($id)
    {
        //
    }

    public function cantidad()
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'POST':

                $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
                $id_pro = isset($_POST['id_pro']) ? (int)$_POST['id_pro'] : 0;
             
                $cantidad = Cantidade::where('id_sucursal',$id)->where('id_producto',$id_pro)->first();

                return ['res' => $cantidad];

                break;

            default:
                
                $res = 0;
                return ['res' => $res];

            break;

        }
    }
}
