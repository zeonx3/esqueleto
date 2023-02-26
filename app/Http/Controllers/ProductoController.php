<?php

namespace App\Http\Controllers;

use App\exports\Producto_excel;
use App\Imports\ProductosImport;
use App\Models\Cantidade;
use App\Models\Producto;
use App\Models\Unimedida;
use App\Models\Categoria;
use App\Models\Log;
use App\Models\Sucursale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

use Yajra\Datatables\Datatables;



class ProductoController extends Controller
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

        $productos = DB::table('productos')
                ->join('categorias','productos.id_categoria','=','categorias.id')
                ->whereIN('productos.id_empresa',$id_empresas)
                ->select('productos.*','categorias.cat_nombre')
                ->get();
        $sucursales = Sucursale::whereIn('id_empresa',$id_empresas)->get();

        $producto = new Producto();
        $unimedida = Unimedida::all();
        $categoria = DB::table('categorias')
                ->whereIn('cat_padres',['0'])
                ->whereIn('id_empresa',$id_empresas)
                ->get();

        $subcat = DB::table('categorias')
        ->whereNotIn('cat_padres',['0'])
        ->whereIn('id_empresa',$id_empresas)
        ->get();

        $codigos = DB::table('productos')
        ->select('pro_sku')
        ->get();
        
        return view('producto.index', compact('productos','producto','unimedida','categoria','subcat','codigos','sucursales'));
    }

    public function registros(Request $request)
    {
        $id_familia = isset($request->id_familia) ? (int)$request->id_familia : 0;
        $codigo =    isset($request->codigo) ? trim($request->codigo) : '';
        $estado = isset($request->estado) ? (int)$request->estado : 0;

        $auth_emp = EmpresasUser(Auth::user()->id);

        $id_empresas = [];
        
        foreach ($auth_emp as $a)
        {
            $id_empresas[] = [
                'id_empresas' => $a->id
            ];
        }

        $producto_set = DB::table('productos')
                        ->join('categorias','categorias.id','=','productos.id_categoria')
                        ->whereIn('productos.id_empresa',$id_empresas);

        if($id_familia > 0)
        {
            $producto_set = $producto_set->where('productos.id_categoria',$id_familia);
        }
        
        if($codigo != '')
        {
            $producto_set = $producto_set->where('productos.pro_sku',$codigo);
        }

        if($estado > 0)
        {
            $estado == 2 ? $estado = 0 : 2;

            $producto_set = $producto_set->where('productos.pro_estado',$estado);
        }

        $producto_rs = $producto_set
                ->select('productos.*','categorias.cat_nombre')
                ->get();


        return Datatables::of($producto_rs)

        ->editColumn('imagen', function ($producto_rs) {
            
            return '<img src="'.$producto_rs->pro_imagen.'"class="rounded-circle" width="40"/>'; })

        ->editColumn('codigo', function ($producto_rs) { 
            
            return "<small style='font-size:11px;'>".$producto_rs->pro_sku."</small>"; })

        ->editColumn('nombre', function ($producto_rs) { 
            
           return "<small class='text-muted' style='font-size:11px;'>".$producto_rs->pro_nombre."</small>";
            
        })

        ->editColumn('familia', function ($producto_rs) { 
            
            return "<small class='text-muted' style='font-size:11px;'>".$producto_rs->cat_nombre."</small>"; 
            
        })

        ->editColumn('estado', function ($producto_rs) { 
            
            switch((int)$producto_rs->pro_estado)
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

        ->editColumn('acciones', function ($producto_rs) { 
            
            if($producto_rs->pro_estado > 0)
            {
                $estado = '<a type="buttom" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#danger-header-modalpro"  onclick="pro_delete('.$producto_rs->id.')">Deshabilitar</a></div></div>';
            }
            else
            {
                $estado = '<a type="buttom" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#success-header-modalpro"  onclick="pro_enable('.$producto_rs->id.')">Habilitar</a></div></div>';
            }

            $producto_rs->id_empresa == 13 ? $stock = '' : $stock = '<a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="capturar('.$producto_rs->id.')" >Actualizar Stock</a>';

            return '<div class="btn-group"><button type="button" class="btn waves-effect waves-dark btn-orange text-white dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-setting"><i class="fas fa-cog"></i><div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting"></button><div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting"><a type="buttom" class="dropdown-item" onclick="show('.$producto_rs->id.')">Detalle</a>
            '.$stock.$estado;
    
        })

        ->rawColumns(['#','imagen','codigo','nombre','familia','estado','acciones'])

        ->make(true);
    }

    public function create()
    {
        $producto = new Producto();
        $unimedida = Unimedida::all();

        return view('producto.create', compact('producto','unimedida'));
    }

    public function store(Request $request)
    {
        $this->Response = ['State' => 200];

        switch($_SERVER['REQUEST_METHOD'])
            {
                case 'POST':

                    $id_categoria = isset($_POST['id_categoria']) ? (int)$_POST['id_categoria'] : 0;
                    $id_sub_categoria = isset($_POST['id_sub_categoria']) ? (int)$_POST['id_sub_categoria'] : 0;
                    $pro_nombre = isset($_POST['pro_nombre']) ? trim($_POST['pro_nombre']) : null;
                    $pro_codigo = isset($_POST['pro_codigo']) ? trim($_POST['pro_codigo']) : null;
                    $pro_cod_barra = isset($_POST['pro_cod_barra']) ? trim($_POST['pro_cod_barra']) : null;

                    $pro_descripcion = isset($_POST['pro_descripcion']) ? trim($_POST['pro_descripcion']) : null;
                    $pro_neto = isset($_POST['pro_neto']) ? (int)$_POST['pro_neto'] : 0;
                    $pro_bruto = isset($_POST['pro_bruto']) ? (int)$_POST['pro_bruto'] : 0;
                    $pro_costo = isset($_POST['pro_costo']) ? (int)$_POST['pro_costo'] : 0;
                    $pro_exento = isset($_POST['pro_exento']) ? (int)$_POST['pro_exento'] : 0;
                    $pro_pesable = isset($_POST['pro_pesable']) ? (int)$_POST['pro_pesable'] : 0;
                    $pro_int_esp = isset($_POST['pro_int_esp']) ? (int)$_POST['pro_int_esp'] : 0;
                    $pro_servicio = isset($_POST['pro_servicio']) ? (int)$_POST['pro_servicio'] : 0; 
                    $id_tipoproducto = isset($_POST['pro_tipo']) ? (int)$_POST['pro_tipo'] : 0;
                    $id_unimedida = isset($_POST['pro_uni_medida']) ? (int)$_POST['pro_uni_medida'] : 0;
                    $id_empresa = count(EmpresasUser(Auth::user()->id)) > 1 ? 9 : EmpresasUser(Auth::user()->id);

                    $id = isset($_POST['pro_id']) ? (int)$_POST['pro_id'] : 0;

                    if($id_categoria == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar la categoria';
                        $this->Response['State'] = 401;
                        break;
                    }

                    if(is_null($pro_nombre))
                    {
                        $this->Response['Message'] = 'Debe ingresar el nombre del producto';
                        $this->Response['State'] = 401;
                        break;
                    }

                    if(is_null($pro_codigo))
                    {
                        $this->Response['Message'] = 'Debe ingresar el codigo del producto';
                        $this->Response['State'] = 401;
                        break;

                    }
                    if(is_null($pro_descripcion))
                    {
                        $this->Response['Message'] = 'Debe ingresar la descripción del producto';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    $idemp = EmpresasUser(Auth::user()->id);
                   
                if((int)$idemp[0]->id == 13)
                {
                    if($id == 0)
                    {
                        if (str_contains(trim($_FILES['pro_imagen']['type']),'image'))
                        {
                        
                        }
                        else
                        {
                            $this->Response['Message'] = 'Formato de imagen no valido';
                            $this->Response['State'] = 401;  
                            break;
                        }

                        if($_FILES['pro_imagen']['error'] > 0)
                        {
                            
                            $this->Response['Message'] = 'Debe ingresar la imagen del producto';
                            $this->Response['State'] = 401;  
                            break;
                        }

                        $check_sku = DB::table('productos')
                                ->where('productos.pro_sku','=',$pro_codigo)
                                ->first();

                        if(!is_null($check_sku))
                        {
                            $this->Response['Message'] = 'El codigo ya esta registrado';
                            $this->Response['State'] = 403;  
                            break;
                        }

                        $producto = new Producto();

                        $producto->pro_nombre = $pro_nombre;
                        $producto->pro_tipo = $id_tipoproducto;
                        $producto->pro_descripcion = $pro_descripcion;
                        $producto->pro_neto = $pro_neto;
                        $producto->pro_bruto = $pro_bruto;
                        $producto->pro_exento = $pro_exento;
                        $producto->pro_pesable = $pro_pesable;
                        $producto->pro_uni_medida = $id_unimedida;
                        $producto->pro_sku = $pro_codigo;
                        $producto->pro_int_esp = $pro_int_esp;
                        $producto->pro_codbarra = $pro_cod_barra;
                        $producto->pro_costo = $pro_costo; 
                        $producto->id_empresa = 13;

                        if($id_sub_categoria == 0)
                        {
                            $producto->id_categoria = $id_categoria;

                        }
                        else
                        {
                            $producto->id_categoria = $id_sub_categoria;
                        }
        
                        $img = $request->file('pro_imagen')->store('imagenes/productos','public');
    
                        $producto->pro_imagen = url("storage/".$img);

                        $images = Image::make(Storage::get($img))
                                ->widen(600)
                                ->limitColors(255)
                                ->encode();
                        $producto->save();

                        Storage::put($img, (string)$images);

                        $log = new Log();

                        $log->log_accion = "Crea el producto ".$producto->pro_nombre;
                        $log->log_ruta = "productos.store";
                        $log->id_usuario = Auth::user()->id;
                        $log->save();

                        $this->Response['Message'] = 'Producto registrado correctamente!.';
                        break;
                    }
                    else
                    {
                        $check_sku = DB::table('productos')
                        ->Where('pro_sku','=',$pro_codigo)
                        ->where('id','<>',$id)
                        ->first();
                
                        if(!is_null($check_sku))
                        {
                            $this->Response['Message'] = 'El codigo ya esta registrado';
                            $this->Response['State'] = 403;  
                            break; 
                        }

                        $producto = Producto::find($id);

                        $producto->pro_nombre = $pro_nombre;
                        $producto->pro_tipo = $id_tipoproducto;
                        $producto->pro_descripcion = $pro_descripcion;
                        $producto->pro_neto = $pro_neto;
                        $producto->pro_bruto = $pro_bruto;
                        $producto->pro_exento = $pro_exento;
                        $producto->pro_pesable = $pro_pesable;
                        $producto->pro_uni_medida = $id_unimedida;
                        $producto->pro_sku = $pro_codigo;
                        $producto->pro_int_esp = $pro_int_esp;
                        $producto->pro_codbarra = $pro_cod_barra;
                        $producto->pro_costo = $pro_costo;

                        if($id_sub_categoria == 0)
                        {
                            $producto->id_categoria = $id_categoria;
                        }
                        else
                        {
                            $producto->id_categoria = $id_sub_categoria;
                        }

                        if($_FILES['pro_imagen']['error'] > 0)
                        {
                        
                        }
                        else
                        {   
                            if (str_contains(trim($_FILES['pro_imagen']['type']),'image'))
                            {  
                                Storage::delete($producto->pro_imagen);
                                $img = $request->file('pro_imagen')->store('imagenes/productos','public');
        
                                $producto->pro_imagen = url("storage/".$img);

                                $images = Image::make(Storage::get($img))
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

                        $producto->save();

                        $log = new Log();

                        $log->log_accion = "Modifica el producto ".$producto->pro_nombre;
                        $log->log_ruta = "productos.store";
                        $log->id_usuario = Auth::user()->id;
                        $log->save();

                        $this->Response['Message'] = 'Producto editado correctamente!.';
                        break;

                    }           
                }
                    if($pro_bruto == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar el valor bruto del producto';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($pro_neto == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar el valor neto del producto';
                        $this->Response['State'] = 401;  
                        break;

                    }

                    if($pro_costo == 0)
                    {
                        $this->Response['Message'] = 'Debe ingresar el valor costo del producto';
                        $this->Response['State'] = 401;  
                        break;
                    }
                    
                    if($pro_servicio == 0)
                    {
                        $this->Response['Message'] = 'Debes indicar si es Producto o Servicio';
                        $this->Response['State'] = 401;  
                        break;
                    }
                    

                if($id == 0)
                {
                    if($pro_servicio == 1)
                    {
                        if($id_tipoproducto == 0)
                        {
                        $this->Response['Message'] = 'Debe ingresar el tipo del producto';
                        $this->Response['State'] = 401;  
                        break;

                        }
                        if(is_null($pro_cod_barra))
                        {
                            $this->Response['Message'] = 'Debe ingresar el codigo de barra del producto';
                            $this->Response['State'] = 401;  
                            break;
                        }
                        
                        if($id_unimedida == 0)
                        {
                            $this->Response['Message'] = 'Debe ingresar la unidad de medida del producto';
                            $this->Response['State'] = 401;  
                            break;

                        }
                        $check_codbarra = DB::table('productos')
                        ->where('productos.pro_codbarra','=',$pro_cod_barra)
                        ->first();
                
                
                        if(!is_null($check_codbarra))
                        {
                            $this->Response['Message'] = 'El codigo de barra ya esta registrado';
                            $this->Response['State'] = 403;  
                            break;
                        }
                    }
                    if (str_contains(trim($_FILES['pro_imagen']['type']),'image'))
                    {
                       
                    }
                    else
                    {
                        $this->Response['Message'] = 'Formato de imagen no valido';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    if($_FILES['pro_imagen']['error'] > 0)
                    {
                        
                        $this->Response['Message'] = 'Debe ingresar la imagen del producto';
                        $this->Response['State'] = 401;  
                        break;
                    }

                    $check_sku = DB::table('productos')
                            ->where('productos.pro_sku','=',$pro_codigo)
                            ->first();

                    if(!is_null($check_sku))
                    {
                        $this->Response['Message'] = 'El codigo ya esta registrado';
                        $this->Response['State'] = 403;  
                        break;
                    }
                    
                    if($pro_servicio == 2)
                    {
                        $id_tipoproducto = 3;
                    }
                    
                    $producto = new Producto();

                        $producto->pro_nombre = $pro_nombre;
                        $producto->pro_tipo = $id_tipoproducto;
                        $producto->pro_descripcion = $pro_descripcion;
                        $producto->pro_neto = $pro_neto;
                        $producto->pro_bruto = $pro_bruto;
                        $producto->pro_exento = $pro_exento;
                        $producto->pro_pesable = $pro_pesable;
                        $producto->pro_uni_medida = $id_unimedida;
                        $producto->pro_sku = $pro_codigo;
                        $producto->pro_int_esp = $pro_int_esp;
                        $producto->pro_codbarra = $pro_cod_barra;
                        $producto->pro_costo = $pro_costo;

                        if(!is_array($id_empresa))
                        {
                            $producto->id_empresa = $id_empresa;
                        }
                        else
                        {
                            $id = $id_empresa[0]['id'];
                            
                            $producto->id_empresa = $id;
                        }  

                    if($id_sub_categoria == 0)
                    {
                        $producto->id_categoria = $id_categoria;

                    }
                    else
                    {
                        $producto->id_categoria = $id_sub_categoria;
                    }

                    Storage::delete($producto->pro_imagen);
        
                    $img = $request->file('pro_imagen')->store('imagenes/productos','public');

                    $producto->pro_imagen = url("storage/".$img);
                        

                    $producto->save();

                    $images = Image::make(Storage::get($img))
                            ->widen(600)
                            ->limitColors(255)
                            ->encode();

                    Storage::put($img, (string)$images);

                    $log = new Log();

                    $log->log_accion = "Crea el producto ".$producto->pro_nombre;
                    $log->log_ruta = "productos.store";
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    $this->Response['Message'] = 'Producto registrado correctamente!.';
                    break;
                }
                else
                {
                    $check_sku = DB::table('productos')
                            ->Where('pro_sku','=',$pro_codigo)
                            ->where('id','<>',$id)
                            ->first();
                    
                    if(!is_null($check_sku))
                    {
                        $this->Response['Message'] = 'El codigo ya esta registrado';
                        $this->Response['State'] = 403;  
                        break; 
                    }

                    if($pro_servicio == 2)
                    {
                        $id_tipoproducto = 3;
                    }

                    $producto = Producto::find($id);

                    $producto->pro_nombre = $pro_nombre;
                    $producto->pro_tipo = $id_tipoproducto;
                    $producto->pro_descripcion = $pro_descripcion;
                    $producto->pro_neto = $pro_neto;
                    $producto->pro_bruto = $pro_bruto;
                    $producto->pro_exento = $pro_exento;
                    $producto->pro_pesable = $pro_pesable;
                    $producto->pro_uni_medida = $id_unimedida;
                    $producto->pro_sku = $pro_codigo;
                    $producto->pro_int_esp = $pro_int_esp;
                    $producto->pro_codbarra = $pro_cod_barra;
                    $producto->pro_costo = $pro_costo;

                   if($id_sub_categoria == 0)
                   {
                       $producto->id_categoria = $id_categoria;
                   }
                   else
                   {
                       $producto->id_categoria = $id_sub_categoria;
                   }

                    if($_FILES['pro_imagen']['error'] > 0)
                    {
                    
                    }
                    else
                    {   
                        if (str_contains(trim($_FILES['pro_imagen']['type']),'image'))
                        {  
                        
                        Storage::delete($producto->pro_imagen);
        
                        $img = $request->file('pro_imagen')->store('imagenes/productos','public');

                        $producto->pro_imagen = url("storage/".$img);
                        
                        }
                        else
                        {
                            $this->Response['Message'] = 'Formato de imagen no valido';
                            $this->Response['State'] = 401;  
                            break;
                        }
                    }

                    $producto->save();

                    $images = Image::make(Storage::get($img))
                            ->widen(600)
                            ->limitColors(255)
                            ->encode();

                    Storage::put($img, (string)$images);

                    $log = new Log();

                    $log->log_accion = "Modifica el producto ".$producto->pro_nombre;
                    $log->log_ruta = "productos.store";
                    $log->id_usuario = Auth::user()->id;
                    $log->save();

                    $this->Response['Message'] = 'Producto editado correctamente!.';
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
        $producto = DB::table('productos')
                ->join('categorias','productos.id_categoria','=','categorias.id')
                ->leftjoin('unimedidas','productos.pro_uni_medida','=','unimedidas.id')
                ->where('productos.id','=',$id)
                ->select('productos.*','unimedidas.unid_nombre','unimedidas.unid_nombre_corto','categorias.cat_nombre')
                ->groupBy('productos.id')
                ->first();

        $cantidad = DB::table('cantidades')
            ->join('sucursales','sucursales.id','=','cantidades.id_sucursal')
            ->where('cantidades.id_producto',$id)
            ->where('sucursales.suc_estado',1)
            ->select('cantidades.*','sucursales.suc_nombre')
            ->get();
       
        $unimedidas = Unimedida::all();

        $categoria = Categoria::whereIn('cat_padres',['0'])->where('id_empresa',$producto->id_empresa)->get();
        
        return view('producto.show', compact('producto','unimedidas','categoria','cantidad'));
    }

    public function delete()
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $producto = Producto::where('id',$id)->first();

        $producto->pro_estado = 0;
        $producto->save();

        $log = new Log();

        $log->log_accion = "Deshabilita el producto ".$producto->pro_nombre;
        $log->log_ruta = "productos.delete";
        $log->id_usuario = Auth::user()->id;
        $log->save();

        $estado = true;

        return ['res'=>$estado];
    }

    public function enable()
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $producto = Producto::where('id',$id)->first();

        $categoria = Categoria::where('id',$producto->id_categoria)->first();

        if($categoria->cat_estado == 0)
        {
            
            
        }
        else
        {
            
            $producto->pro_estado = 1;
            $producto->save();

            $log = new Log();

            $log->log_accion = "Habilita producto ".$producto->pro_nombre;
            $log->log_ruta = "productos.enable";
            $log->id_usuario = Auth::user()->id;
            $log->save();

            $estado = true;

        }

        return ['res'=>$estado];
    }

    public function get_productos()
    {
        $productos =  Producto::all();

        return $productos;
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

                $id_categoria = isset($_POST['id_categoria']) ? (int)$_POST['id_categoria'] : 0;
                $id_subcategoria = isset($_POST['id_subcategoria']) ? (int)$_POST['id_subcategoria'] : 0;
                $term = isset($_POST['q']) ? trim($_POST['q']) : null;

                $items = [];
                $n = 0;

                if($id_subcategoria != 0) 
                {
                    $producto_set = Producto::where('id_categoria','=',$id_subcategoria);

                    if(!is_null($term))
                    {
                        $producto_set = $producto_set->Where('pro_nombre','LIKE','%'.$term.'%');
                    }

                    $producto_rs = $producto_set
                        ->groupBy('id')
                        ->get();
                    
                    foreach($producto_rs as $pro)
                    {
                        $items[] = [

                            'id' => $pro->id,
                            'text' => $pro->pro_nombre." | $.".$pro->pro_bruto
                        ];
                    }

                }
                else
                {
                    $producto_set = Producto::where('id_categoria','=',$id_categoria);

                    if(!is_null($term))
                    {
                        $producto_set = $producto_set->Where('pro_nombre','LIKE','%'.$term.'%');
                    }

                    $producto_rs = $producto_set
                        ->groupBy('id')
                        ->get();
                    
                    foreach($producto_rs as $pro)
                    {
                        $items[] = [

                            'id' => $pro->id,
                            'text' => $pro->pro_nombre

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

    public function stock()
    {

        $this->Response = ['State' => 200];

        switch($_SERVER['REQUEST_METHOD'])
            {
            case 'POST':
        
                $id = isset($_POST['mod_producto']) ? (int)$_POST['mod_producto'] : 0 ;

                $producto = Producto::where('id',$id)->first();

                $id_sucursal = isset($_POST['id_sucursal']) ? (int)$_POST['id_sucursal'] : 0;
                $sto_cantidad = isset($_POST['mod_cantidad']) ? (int)$_POST['mod_cantidad'] : 0;

                if($id_sucursal == 0)
                {
                    $this->Response['State'] = 401 ;
                    $this->Response['Message'] = 'Debes ingresar la sucursal';
                    break;
                }

                $sto = Cantidade::Where('id_producto',$id)->where('id_sucursal',$id_sucursal)->first();

                if(isset($sto))
                {
                    $sto->sto_cantidad = (int)$sto_cantidad;
                    $sto->save();
                }
                else
                {
                    $stock = new Cantidade();
                    $stock->id_producto = $id;
                    $stock->id_sucursal = $id_sucursal;
                    $stock->sto_cantidad = (int)$sto_cantidad;
                    $stock->save();
                }
                

                $log = new Log();

                $log->log_accion = "Actualiza el stock del producto ".$producto->pro_nombre;
                $log->log_ruta = "productos.stock";
                $log->id_usuario = Auth::user()->id;
                $log->save();

            
                $this->Response['Message'] = 'Stock actualizado!.';
        break;

        default:

        $this->Response['status'] = 0;
        $this->Response['Message'] = 'Methodo no definido';
        break;
        }
            

        return response()->json($this->Response);

    }

    public function findproducto()
    {      
      switch($_SERVER['REQUEST_METHOD'])
        {
            case 'POST':

                $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
             
                $producto = Producto::where('id',$id)->first();
                return ['res' => $producto];

                break;

            default:
                
                $res = 0;
                return ['res' => $res];

            break;

        }
    }

    public function importexcel(Request $request)
    {
        
        $this->Response = ['State' => 200];

        switch($_SERVER['REQUEST_METHOD'])
            {
                case 'POST':
                    
                    $file = $request->file('pro_import');
                    try{
                        $data = new ProductosImport; 
                        Excel::import($data ,$file);
                        if($data->codigo != 200)
                        {
                            $this->Response['State'] = 400;
                            $this->Response['Message'] = $data->result;
                            break;
                        }
                        elseif($data->codigo == 200)
                        {
                           
                            $this->Response['State'] =  200;
                            $this->Response['Message'] = $data->result;
                            $archivos = $request->file('pro_imagenes');

                            foreach($archivos as $a )
                            {
                               $name =  (pathinfo($a->getClientOriginalName(),PATHINFO_FILENAME));

                                $producto = Producto::where('pro_sku',$name)->first();
                               
                                if(isset($producto))
                                {
                                    Storage::delete($producto->pro_imagen);

                                    $img = $a->store('imagenes/productos','public');
    
                                    $producto->pro_imagen = url("storage/".$img);
            
                                    $images = Image::make(Storage::disk('public')->get($img))
                                            ->widen(600)
                                            ->limitColors(255)
                                            ->encode();

                                    $producto->save();
            
                                    Storage::put($img, (string)$images);
                                }
                                else
                                {
                                    $this->Response['State'] = 400;
                                    $this->Response['Message'] = "El codigo ".$name." no esta registrado";
                                    break;
                                }
                            }

                            break;
                        }

                    }catch(\Maatwebsite\Excel\Validators\ValidationException $e)
                    {
                        $failures = $e->failures();
                        session()->flash('error');

                        foreach( $failures as $f)
                        {
                           
                           $this->Response['State'] = 401;
                           $this->Response['Message'] = $f->errors();

                           return response()->json($this->Response);
                        }
                        
                        return redirect()->back()->withInput()->withErrors($failures);
                    }

                break;

                default:

                $this->Response['State'] = 0;
                $this->Response['Message'] = 'Methodo no definido';
                break;
            }
        return response()->json($this->Response);

    }

    public function importejemplo()
    {
        return Excel::download(new Producto_excel, 'planilla_ejemplo.xlsx');
    }

}

