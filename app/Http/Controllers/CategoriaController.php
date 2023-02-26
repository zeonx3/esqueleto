<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class CategoriaController extends Controller
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

        $cat_sub = Categoria::WhereNotIn('cat_padres',['0'])->whereIn('id_empresa',$id_empresas)->get();
        
        $cat_padre = Categoria::wherein('cat_padres',['0'])->whereIn('id_empresa',$id_empresas)->get();

        return view('categoria.index', compact('cat_padre','cat_sub'));

    }

    public function registros(Request $request)
    {

        $auth_emp = EmpresasUser(Auth::user()->id);

        $id_empresas = [];
        
        foreach ($auth_emp as $a)
        {
            $id_empresas[] = [
                'id_empresas' => $a->id
            ];
        }

        $categorias_set = Categoria::whereIn('id_empresa',$id_empresas[0]); 

        $categorias_rs = $categorias_set->get();

        return DataTables::of($categorias_rs)

        ->editColumn('imagen', function ($categorias_rs) {
            
            return '<img src="'.$categorias_rs->cat_imagen.'"class="rounded-circle" width="40"/>'; })

        ->editColumn('nombre', function ($categorias_rs) { 
            
           return "<small class='text-muted' style='font-size:11px;'>".$categorias_rs->cat_nombre."</small>";
        })

        ->editColumn('tipo', function ($categorias_rs) { 
            
            $tipo = str_contains($categorias_rs->cat_padres,'0') ? 'Familia' : 'Sub Familia';
            return "<small class='text-muted' style='font-size:11px;'>".$tipo."</small>"; 
            
        })

        ->editColumn('estado', function ($categorias_rs) { 
            
            switch((int)$categorias_rs->cat_estado)
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

        ->editColumn('acciones', function ($categorias_rs) { 
            
            if($categorias_rs->cat_estado > 0)
            {
                $estado = '<a type="buttom" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#danger-header-modal"  onclick="pro_delete('.$categorias_rs->id.')">Deshabilitar</a></div></div>';
            }
            else
            {
                $estado = '<a type="buttom" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#success-header-modal"  onclick="pro_enable('.$categorias_rs->id.')">Habilitar</a></div></div>';
            }

            return '<div class="btn-group"><button type="button" class="btn waves-effect waves-dark btn-orange text-white dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-setting"><i class="fas fa-cog"></i><div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting"></button><div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting"><a type="buttom" class="dropdown-item" onclick="show('.$categorias_rs->id.')">Detalle</a>
            '.$estado;
    
        })

        ->rawColumns(['imagen','nombre','tipo','estado','acciones'])

        ->make(true);
    }

    public function store(Request $request)
    {

        $this->Response = ['State' => 200];

        switch($_SERVER['REQUEST_METHOD'])
            {
                case 'POST':

                $cat_nombre = isset($_POST['cat_nombre']) ? trim($_POST['cat_nombre']) : '';

                $cat_tipo = isset($_POST['cat_tipo']) ? (int)$_POST['cat_tipo'] : 0;

                $cat_padre = isset($_POST['cat_padre']) ? (int)$_POST['cat_padre'] : 0;

                $id_empresa = isset($_POST['id_empresa']) ? (int)$_POST['id_empresa'] : 0;
                $id_subfamily = isset($_POST['sub_familia']) ? (int)$_POST['sub_familia'] : 0;

                $categoria = new Categoria();

                $id = isset($_POST['cat_id']) ? (int)$_POST['cat_id'] : 0;

                $cat = Categoria::find($id);

                if($id_empresa == 0)
                {
                    $this->Response['Message'] = 'Debes ingresar la empresa';
                    $this->Response['State'] = 401;
                    break;
                }
                elseif(count(EmpresasUser(Auth::user()->id)) == 1)
                {
                   foreach(EmpresasUser(Auth::user()->id) as $e)
                   {
                        $id_empresa = $e->id;
                   }
                }

                if($cat_tipo == 0)
                {
                    $this->Response['Message'] = 'Debes seleccionar el tipo de familia';
                    $this->Response['State'] = 401;
                    break;
                }
                elseif($cat_tipo == 1)
                {
                    if(is_null($cat_nombre) || $cat_nombre == '')
                    {
                        $this->Response['Message'] = 'Debes ingresar el nombre';
                        $this->Response['State'] = 401;
                        break;
                    }

                    if(isset($cat))
                    {
                        $cat_padre = 0;

                        $check_nombre = Categoria::where('cat_nombre','like',$cat_nombre)->where('id','<>',$cat->id)->first();

                        if(is_null($check_nombre))
                        {
                        }
                        else{

                            if(trim($check_nombre->cat_nombre) == $cat_nombre)
                            {
                                $this->Response['Message'] = 'El nombre de categoria ya esta registrado';
                                $this->Response['State'] = 401;
                                break;
                            }

                        }

                        if($_FILES['cat_imagen']['error'] > 0)
                        {
                        
                        }
                        else
                        {   
                            if (str_contains(trim($_FILES['cat_imagen']['type']),'image'))
                            {  
                                $img = $request->file('cat_imagen')->store('imagenes/categorias','public');
    
                                $cat->cat_imagen = url("storage/".$img);

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

                        if($cat_nombre == '' || is_null($cat_nombre))
                        {
                            $this->Response['Message'] = 'Debes ingresar el nombre';
                            $this->Response['State'] = 401;
                            break;
                        }

                        $cat->cat_nombre = $cat_nombre;
                        $cat->cat_padre = $cat_padre;
                        $cat->cat_video = $cat_video;
                        $cat->id_empresa = $id_empresa;

                        $cat->save();
                        if($cat->id)
                        {
                            $log = new Log();

                            $log->log_accion = "Crea o Modifica sub familia ".$cat->cat_nombre;
                            $log->log_ruta = $request->route()->getName();
                            $log->id_usuario = Auth::user()->id;
                            $log->save();
                         
                        }

                        $this->Response['Message'] = 'Familia editara correctamente!.';
                        break;
                    }
                    else
                    {
                        $check_nombre = Categoria::where('cat_nombre','like',$cat_nombre)->first();

                        if(is_null($check_nombre))
                        {
                        }
                        else
                        {
                            if(trim($check_nombre->cat_nombre) == $cat_nombre)
                            {
                                $this->Response['Message'] = 'El nombre de familia ya esta registrado';
                                $this->Response['State'] = 401;
                                break;
                            }
                        }

                        $cat_padre = 0;

                        if($_FILES['cat_imagen']['error'] > 0)
                        {
                        
                        }
                        else
                        {   
                            if (str_contains(trim($_FILES['cat_imagen']['type']),'image'))
                            {  
                                $img = $request->file('cat_imagen')->store('imagenes/categorias','public');

                                $categoria->cat_imagen = url("storage/".$img);

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

                        if($cat_nombre == '' || is_null($cat_nombre))
                        {
                            $this->Response['Message'] = 'Debes ingresar el nombre';
                            $this->Response['State'] = 401;
                            break;
                        }
                        //nueva categoria
                        $categoria->cat_nombre = $cat_nombre;
                        $categoria->cat_padres = $cat_padre;
                        $categoria->id_empresa = $id_empresa;

                        $categoria->save();

                        if($categoria->id)
                        {
                            $log = new Log();

                            $log->log_accion = "Crea o Modifica Familia :".$categoria->cat_nombre;
                            $log->log_ruta = $request->route()->getName();
                            $log->id_usuario = Auth::user()->id;
                            $log->save();
                         
                        }
                        $this->Response['Message'] = 'Familia creada correctamente!.';
                        break;

                    }

                }
                else
                {
                    if($cat_padre == 0)
                    {
                        $this->Response['Message'] = 'Debes seleccionar la familia padre';
                        $this->Response['State'] = 401;
                        break;

                    }
                
                    if($id > 0 )
                    {
                        if($_FILES['cat_imagen']['error'] > 0)
                        {
                        
                        }
                        else
                        {   
                            if (str_contains(trim($_FILES['cat_imagen']['type']),'image'))
                            {  
                            
                                $img = $request->file('cat_imagen')->store('imagenes/categorias','public');

                                $cat->cat_imagen = url("storage/".$img);

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
                       
                    }
                    else
                    {
                       
                        if($_FILES['cat_imagen']['error'] > 0)
                        {
                        
                        }
                        else
                        {   
                            if (str_contains(trim($_FILES['cat_imagen']['type']),'image'))
                            {  
            
                                $img = $request->file('cat_imagen')->store('imagenes/categorias/','public');
                                $categoria->cat_imagen = url("storage/".$img);
        
                                $images = Image::make(Storage::disk('public')->get($img))
                                        ->widen(600)
                                        ->limitColors(255)
                                        ->encode();

                            }
                            else
                            {
                                $this->Response['Message'] = 'Formato de imagen no valido';
                                $this->Response['State'] = 401;  
                                break;
                            }
                        }
                    }
                    
                }

                if($id > 0)
                {
                    if(is_null($cat_nombre) || $cat_nombre == '')
                    {
                        $this->Response['Message'] = 'Debes ingresar el nombre';
                        $this->Response['State'] = 401;
                        break;
                    }

                    $cat->cat_nombre = $cat_nombre;
                    $cat->cat_padres = $cat_padre;
                    $cat->id_empresa = $id_empresa;

                    $cat->save();
                    $this->Response['Message'] = 'Categoria editara correctamente!.';
                    break;

                }
                else
                {
                    // nueva sub categoria

                    if($id_subfamily > 0)
                    {
                        $subfa = Categoria::find($id_subfamily);
                        $fam = [];
                        
                        array_push($fam, $subfa->cat_padres);
                        array_push($fam, $cat_padre);
                      
                        $subfa->cat_padres = implode(',',$fam);
                    
                        $subfa->save();
                        $this->Response['Message'] = 'Categoria creada correctamente!.';
                        break;

                    }
                    else
                    {
                    $categoria->cat_nombre = $cat_nombre;
                    $categoria->cat_padres = $cat_padre;
                    $categoria->id_empresa = $id_empresa;
                   
                    $categoria->save();
                    $this->Response['Message'] = 'Categoria creada correctamente!.';
                    break;
                    }

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
        $auth_emp = EmpresasUser(Auth::user()->id);

        $id_empresas = [];
        $cat_hijas = [];
        
        foreach ($auth_emp as $a)
        {
            $id_empresas[] = [
                'id_empresas' => $a->id
            ];
        }

        $categoria = DB::table('categorias')->where('id',$id)->first();

        $cat_padre = DB::table('categorias')->whereIn('id_empresa',$id_empresas)->where('id',$categoria->cat_padres)->select('cat_nombre')->first();

        $hijas = DB::table('categorias')->whereIn('id_empresa',$id_empresas)->get();
        
        foreach($hijas as $h)
        {
            $id_pa = explode(',',$h->cat_padres);

            foreach($id_pa as $a)
            {
                if($a == $id)
                {
                    $b = Categoria::where('cat_padres','LIKE',"%".$a."%")->get();
                    $cat_hijas = $b;
                }
            }
        }

        $categorias = Categoria::whereIn('cat_padres',['0'])->whereIn('id_empresa',$id_empresas)->get();

        $productos = DB::table('productos')->where('id_categoria',$id)->get();

        return view('categoria.show', compact('categoria','cat_padre','cat_hijas','categorias','productos'));

    }

    public function delete(Request $request)
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $categoria = Categoria::where('id',$id)->first();

        if($categoria->cat_padres == 0)
        {
            DB::table('productos')->where('id_categoria',$id)->update([
                'pro_estado' => 0
            ]);
            DB::table('categorias')->where('cat_padre',$id)->update([
                'cat_estado' => 0
            ]);
            $categoria->cat_estado = 0;
            $categoria->save();

            $log = new Log();

            $log->log_accion = "Deshabilita familia ".$categoria->cat_nombre;
            $log->log_ruta = $request->route()->getName();
            $log->id_usuario = Auth::user()->id;
            $log->save();
                
            $estado = true;

        }
        else
        {

            DB::table('productos')->where('id_categoria',$id)->update([
                'pro_estado' => 0
            ]);

            $categoria->cat_estado = 0;
            $categoria->save();

            $estado = true;

        }

        return ['res'=>$estado];
    }

    public function enable(Request $request)
    {
        
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;

        $categoria = Categoria::where('id',$id)->first();

        $cat_padre = Categoria::where('id',$categoria->cat_padres)->first();

        if($categoria->cat_padres > 0)
        {
            if($cat_padre->cat_estado == 0)
            {
              
               
            }
            else
            {
                $categoria->cat_estado = 1;
                $categoria->save();
                $log = new Log();

                $log->log_accion = "Habilita familia ".$categoria->cat_nombre;
                $log->log_ruta = $request->route()->getName();
                $log->id_usuario = Auth::user()->id;
                $log->save();
                $estado = true;
            }
        }
        else
        {
            $categoria->cat_estado = 1;
            $categoria->save();
            $log = new Log();

            $log->log_accion = "Habilita familia ".$categoria->cat_nombre;
            $log->log_ruta = $request->route()->getName();
            $log->id_usuario = Auth::user()->id;
            $log->save();
            $estado = true;

        }

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

                $id_categoria = isset($_POST['id_categoria']) ? (int)$_POST['id_categoria'] : 0;
                $term = isset($_POST['q']) ? trim($_POST['q']) : null;

                $items = [];
                $n = 0;

                if($id_categoria != 0) 
                {
                    $sub_categoria_set = Categoria::where('cat_padres','LIKE','%'.$id_categoria.'%');
                    
                    $cat_padre = Categoria::find($id_categoria);
                    if(!is_null($term))
                    {
                        $sub_categoria_set = $sub_categoria_set->where('categorias.cat_nombre','LIKE','%'.$term.'%');
                    }

                    $sub_categoria_rs = $sub_categoria_set
                        ->groupBy('categorias.id')
                        ->get();
                    
                    foreach($sub_categoria_rs as $cat)
                    {
                        $items[] = [

                            'id' => $cat->id,
                            'text' => $cat->cat_nombre." | ".$cat_padre->cat_nombre
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

    public function get_categorias()
    {
        $categoria = Categoria::all();

        return response()->json($categoria);

    }


}
