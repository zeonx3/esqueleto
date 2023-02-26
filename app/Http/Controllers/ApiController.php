<?php

namespace App\Http\Controllers;

use App\Models\Autoatencionficha;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Direccion;
use App\Models\Formadepago;
use App\Models\Pregunta;
use App\Models\Producto;
use App\Models\Respuesta;
use App\Models\Stock;
use App\Models\Sucursale;
use App\Models\User;
use App\Models\Venta;
use DateTime;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    static function GET_URL(){ return 'http://appnetstore.cl';}
   /*  static function GET_KEY(){ return 'a8ad1812daadb6a103d929668d7f700ab7edcdc7cc7614afe1370dd36ceed1139920db050ff360cdb8e149f0b6a01739681f4c61d132c560ac21395c5fbc6949';} */
    static function GET_KEY(){ return 'c9fd1adc4b6ab567a7a6dcc0c69a71f454025a8d2068e9a01a018e5efc0997403491f7a7d3a0c1229357c6d0c578547b361e96aa28b706b45f4b3490186a5553';}
    /* eb94ab6c3532f7a3da47cd3ded7a0c37658c8896672600124f8e20ed134afa54fec79c75bf01c1811a419f7d4c9d25b074be094b96e6de13e51600d94acc7902 */
 
    public static function Get_Familia()
    {
        $resultado = [];
        $client = new Client();

        $URL = ApiController::GET_URL().'/api/familia';

        $response = $client->request('get', $URL, [
            'headers' => [
                'token' => ApiController::GET_KEY(),
            ],

        ]);
        
        $resultado = $response->getBody()->getContents();
        $resultado = json_decode($resultado);

        foreach( $resultado as $r)
        {
            $c = new Categoria();

            $c->id = $r->id;
            $c->cat_nombre = $r->nombre;
            $c->cat_estado = $r->estado;
            $c->cat_padre = 0;
            /* $c->save(); */

        }

        if( $resultado == null){return $resultado;}

        return $resultado;

    }

    public static function Get_Cliente()
    {
        $resultado = [];
        $client = new Client();

        $URL = ApiController::GET_URL().'/api/clientes';

        $response = $client->request('get', $URL, [
            'headers' => [
                'token' => ApiController::GET_KEY(),
            ],

        ]);
        
        $resultado = $response->getBody()->getContents();
        $resultado = json_decode($resultado);

        $i = 0;

        foreach( $resultado as $r)
        {
            $c = new Cliente();

            $c->cli_nombre      = $r->razon_social;
            $c->cli_nomfanta    = $r->nombre_fantasia;
            $c->cli_rut         = $r->rut_cliente;
            $c->cli_giro        = $r->giro;
            $c->id_direccion    = $r->id_direccion;
            $c->cli_telefono    = '+569222222'.$i;
            $c->id              = $r->id;
            $c->cli_mail        = 'sin@correo.cl'.$i;
            $c->cli_estado      = $r->estado;

            $i++;

            DB::table('empresaclientes')->insert([
                'id_empresa' => $r->id_empresa,
                'id_cliente' => $c->id
            ]);

        }

        if( $resultado == null){return $resultado;}

        return $resultado;

    }

    public static function Get_Subfamilias()
    {
        $resultado = [];
        $client = new Client();

        $URL = ApiController::GET_URL().'/api/subfamilia';

        $response = $client->request('get', $URL, [
            'headers' => [
                'token' => ApiController::GET_KEY(),
            ],

        ]);
        
        $resultado = $response->getBody()->getContents();
        $resultado = json_decode($resultado);

        foreach( $resultado as $r)
        {

            $c = new Categoria();

            $c->id = $r->id;
            $c->cat_padre = $r->id_familia;
            $c->cat_nombre = $r->nombre;
            $c->cat_estado = $r->estado;

            /* $c->save(); */

        }

        if( $resultado == null){return $resultado;}

        return $resultado;

    }

    public static function Get_Productos()
    {
        $resultado = [];
        $client = new Client();

        $URL = ApiController::GET_URL().'/api/productos';

        $response = $client->request('get', $URL, [
            'headers' => [
                'token' => ApiController::GET_KEY(),
            ],

        ]);
        
        $resultado = $response->getBody()->getContents();
        $resultado = json_decode($resultado);

        foreach( $resultado as $r)
        {
           
            $p = new Producto();
            $p->id_empresa      = $r->id_empresa;
            $p->id              = $r->id;
            $p->pro_nombre      = $r->nombre;
            $p->pro_descripcion = $r->descripcion;
            $p->pro_uni_medida  = 1;
            $p->pro_neto        = $r->precio_venta_neto;
            $p->pro_sku         = $r->codigo;
            $p->pro_codbarra    = $r->codigo_barra;
            $p->id_categoria    = $r->id_familia;
            $p->pro_imagen      = $r->imagen;
            $p->pro_estado      = $r->estado;
            $p->pro_tipo        = $r->tipo == "base" ? '1' : '2';
            $p->pro_bruto       = $r->precio_costo;
            $p->pro_exento      = $r->excento == "false" ? '0' : '1';
            $p->pro_pesable     = $r->pesable == "false" ? '0' : '1';

            /* $p->save(); */

        }

        if( $resultado == null){return $resultado;}

        return $resultado;

    }

    public static function Get_Formapagos()
    {
        $resultado = [];
        $client = new Client();

        $URL = ApiController::GET_URL().'/api/formapago';

        $response = $client->request('get', $URL, [
            'headers' => [
                'token' => ApiController::GET_KEY(),
            ],

        ]);
        
        $resultado = $response->getBody()->getContents();
        $resultado = json_decode($resultado);

        foreach( $resultado as $r)
        {

            $f = new Formadepago();
            $f->id = $r->id;
            $f->id_empresa  = $r->id_empresa;
            $f->fmp_nombre  = $r->nombre;
            $f->fmp_sii     = $r->sii;
            $f->fmp_estado  = $r->estado;
            
            /* $f->save(); */

        }

        if( $resultado == null){return $resultado;}

        return $resultado;

    }


    public static function Get_Bodegas()
    {
        $resultado = [];
        $client = new Client();

        $URL = ApiController::GET_URL().'/api/bodega';

        $response = $client->request('get', $URL, [
            'headers' => [
                'token' => ApiController::GET_KEY(),
            ],

        ]);
        
        $resultado = $response->getBody()->getContents();
        $resultado = json_decode($resultado);

        foreach( $resultado as $r)
        {

            $b = new Bodega();
            $b->id                  = $r->id;
            $b->id_sucursal         = $r->id_sucursal;
            $b->id_empresa          = $r->id_empresa;
            $b->bod_codigo          = $r->codigo;
            $b->bod_responsable     = $r->responsable;
            $b->bod_estado          = $r->estado;
            $b->bod_descripcion     = $r->descripcion;

            /* $b->save(); */

        }

        if( $resultado == null){return $resultado;}

        return $resultado;

    }

    public static function Get_Sucursales()
    {
        $resultado = [];
        $client = new Client();

        $URL = ApiController::GET_URL().'/api/sucursal';

        $response = $client->request('get', $URL, [
            'headers' => [
                'token' => ApiController::GET_KEY(),
            ],

        ]);
        
        $resultado = $response->getBody()->getContents();
        $resultado = json_decode($resultado);

        foreach( $resultado as $r)
        {
            $s = new Sucursale();

            $s->id              = $r->id;
            $s->suc_nombre      = $r->nombre;
            $s->suc_telefono    = $r->telefono;
            $s->suc_mail        = $r->correo;
            $s->suc_web         = $r->web;

            $d = new Direccion();

            $d->dir_calle       = $r->direccion;
            $d->dir_numero      = 123;
            $d->id_comuna       = 1;

            /* $d->save(); */

            $s->id_direccion    = $d->id;

            /* $s->save(); */

        if( $resultado == null){return $resultado;}

        return $resultado;

        }
    }

    public static function Get_Direcciones()
    {
        $resultado = [];
        $client = new Client();

        $URL = ApiController::GET_URL().'/api/direccion';

        $response = $client->request('get', $URL, [
            'headers' => [
                'token' => ApiController::GET_KEY(),
            ],

        ]);
        
        $resultado = $response->getBody()->getContents();
        $resultado = json_decode($resultado);


        foreach( $resultado as $r)
        {
        
            $d = new Direccion();
            $d->id              = $r->id;
            $d->dir_calle       = $r->direccion;
            $d->id_comuna       = 1;
            $d->dir_numero      = 1;

            /* $d->save(); */

        }

        if( $resultado == null){return $resultado;}

        return $resultado;

    }

    public static function Get_Inventario()
    {
        $resultado = [];
        $client = new Client();

        $URL = ApiController::GET_URL().'/api/inventario';

        $response = $client->request('get', $URL, [
            'headers' => [
                'token' => ApiController::GET_KEY(),
            ],

        ]);
        
        $resultado = $response->getBody()->getContents();
        $resultado = json_decode($resultado);
    
        foreach( $resultado as $r)
        {
           
            $s = new Stock();
            $s->id          = $r->id;
            $s->id_bodega   = $r->id_bodega;
            $s->id_producto = $r->producto_id == null ? 0 : $r->producto_id;
            $s->sto_cantidad = $r->stock;
            /* $s->save(); */

        }

        if( $resultado == null){return $resultado;}

        return $resultado;

        
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('usu_username','password')))
        {
            return response()->json(['mensaje'=>'login invalido'],401);
        }

        $user = User::where('usu_username',$request['usu_username'])->firstOrFail();

        if(is_null($user->usu_token))
        {
            $token = $user->createToken("auth_token")->plainTextToken;
            $user->usu_token = $token;
            $user->save();
        }

        return response()->json([
            'user'=>$user,
        ]);
    }

    public function get_preguntas()
    {

        $preguntas = Pregunta::join('empresaplataformas','empresaplataformas.id_empresa','=','preguntas.id_empresa')
                ->join('autoatenciones','autoatenciones.id_empresaplataforma','=','empresaplataformas.id')
                ->Where('preguntas.pre_estado',1)
                ->select('preguntas.*',DB::raw('autoatenciones.id as id_autoatencion'))
                ->get();

        $resultado = [];

        foreach($preguntas as $p)
        {
            
            $resultado[] =
            [
                'id_pregunta' => $p->id,
                'id_empresa' => $p->id_empresa,
                'pregunta' => $p->pre_nombre,
                'id_totem' => $p->id_autoatencion

            ];
            
        }
       
       return response()->json($resultado);
        
    }

    public function get_respuesta(Request $request)
    {
       $id_pregunta = $request['id_pregunta']; 

       $respuesta = Respuesta::where('id_pregunta',$id_pregunta)->where('res_estado',1)->get();
       
       $resultado = [];

       
        foreach($respuesta as $r)
        {

            $pro[] = explode(',',$r->id_productos);

            foreach($pro as $p)
            {

                $produ = Producto::join('categorias','categorias.id','=','productos.id_categoria')->select('productos.*','categorias.cat_imagen')->find($p);
            }

            $resultado[$r->id] =
            [
                'respuesta' => $r->res_nombre,
                'productos[]' => $produ,
                'res_pregunta' => $r->res_pregunta,
                'res_tipo' => $r->res_tipo
            ];

        }   
       
       return response()->json($resultado);
        
    }

    public function get_autfichas(Request $request)
    {
        $id_producto = $request['id_producto'];
        $autoatencionficha = Autoatencionficha::where('id_producto',$id_producto)->first();
       
        $resultado[] =
        [   
            'id_producto' => $autoatencionficha->id_producto,
            'video' => $autoatencionficha->aut_video,
            'imagen slider1' => $autoatencionficha->aut_img1,
            'imagen slider2' => $autoatencionficha->aut_img2,
            'imagen slider3' => $autoatencionficha->aut_img3,
            'imagen slider4' => $autoatencionficha->aut_img4,
            'imagen slider5' => $autoatencionficha->aut_img5,
            'QR'             => $autoatencionficha->aut_qr,
            'Presentacion'   => $autoatencionficha->aut_pie,

        ];
       
       return response()->json($resultado);
    }

    public function get_catimagen()
    {
        $cat_imagen = Categoria::where('cat_estado',1)
        ->Where('id_empresa',13)
        ->WhereNotIn('cat_padres',[0])
        ->select('id','cat_imagen','cat_video')
        ->get();
       
        $resultado = [];

        foreach($cat_imagen as $a)
        {
            
            $resultado[] =
            [
                'id_categoria' => $a->id,
                'img_categoria' => $a->cat_imagen,
                'video_categoria' => $a->cat_video,
            ];
            
        }
       
       return response()->json($resultado);
    }

    public static function post_venta($venta)
    { 
        $venta = Venta::find($venta->id);
        $ventad = DB::table('ventadetalles')
            ->join('productos','productos.id','=','ventadetalles.id_producto')    
            ->where('id_venta',$venta->id)->get();

        $i = 1;
        $iva = (int)$venta->ven_total * 0.19;
        $client = new Client();
        $headers = [
        'token' => 'c9fd1adc4b6ab567a7a6dcc0c69a71f454025a8d2068e9a01a018e5efc0997403491f7a7d3a0c1229357c6d0c578547b361e96aa28b706b45f4b3490186a5553',
        'Content-Type' => 'text/plain'
        ];

        $body = array(
                "Total" => (int)$venta->ven_total,
                "NetoExento" => (int)$venta->ven_total,
                "NetoAfecto" => (int)$venta->ven_total,
                "IVA" => (int)$iva,
                "Descuento" => 0,
                "formapago" => (int)$venta->id_formadepago,
                "Documento" => 1002,
                "Propina" => 0,
                "Observacion" => "",
                "Centrocosto" => "4",
                "Bodega" => "1",
                "Dia" => (new DateTime( $venta->created_at))->format('d'),
                "Mes" => (new DateTime( $venta->created_at))->format('m'),
                "Anio" => (new DateTime( $venta->created_at))->format('o'),
                "FechaVencimiento" => "12-12-2099",
                "Estado" => (int)$venta->ven_estado,
                "Cliente" => "66666666-6"
            );
            foreach ($ventad as $vd)
            {
                $deta[] =
                    array(    
                    "Item" => $i++,
                    "Detallelargo" => "",
                    "Codigo" => trim($vd->pro_sku),
                    "Precio" => (int)$vd->pro_bruto,
                    "Cantidad" => (int)$vd->vend_cantidad,
                    "Descuento" => 0    
                    );
                
                $detalle = $deta;
            }
            $pago[] = array(
                "Formapago" => trim($venta->id_tipodocumento),
                "Total" => (int)$venta->ven_total
            ); 
        $cuerpo = array("Encabezado"=>$body,"Detalle"=>$detalle,"Pago"=>$pago);
        $data = json_encode($cuerpo);
        dd($data);
        $request = new Psr7Request('POST', 'http://appnetstore.cl/api/venta', $headers, $data);
        $res = $client->sendAsync($request)->wait();
        return $res->getBody();

    

    }
    
}
