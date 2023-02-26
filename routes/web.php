<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\NotadeventaController;
use App\Http\Controllers\MetododepagoController;
use App\Http\Controllers\SucursaleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormadepagoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Route::get('/', function(){
    if(Auth::user())
    {
       return redirect('dashboard');
    }
    else{
        return redirect('login');
    }
});

Route::view('login', 'auth.inicio')->name('login')->middleware('guest');
Route::post('loginn', [AuthController::class,'loginPost'])->name('loginn');
Route::post('logout', [AuthController::class,'logout']);
Route::get('password/reset', [AuthController::class,'PasswordReset'])->name('password.reset');

Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::resource('ventas', VentaController::class)->middleware('rol');
Route::resource('usuariosempresas', UsuariosempresaController::class)->middleware('rol');
Route::resource('sucursales', SucursaleController::class);
Route::resource('roles', RoleController::class)->middleware('rol');
Route::resource('clientes', ClienteController::class)->middleware('rol');
Route::resource('productos', ProductoController::class)->middleware('rol');
Route::resource('empresas', EmpresaController::class)->middleware('rol');
Route::resource('categorias', CategoriaController::class)->middleware('rol');
Route::resource('cotizaciones', CotizacionController::class)->middleware('rol');
Route::resource('notadeventas', NotadeventaController::class)->middleware('rol');
Route::resource('usuarios', UsuarioController::class)->middleware('rol');
Route::resource('metododepagos', MetododepagoController::class)->middleware('rol');
Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store')->middleware('rol');

Route::get('empresas/cotizacion/{id}', [EmpresaController::class,'cotizacion'])->name('empresas.cotizacion')->middleware('rol');
Route::get('clientes/cotizacion/{id}', [ClienteController::class,'cotizacion'])->name('clientes.cotizacion')->middleware('rol');

Route::post('cotizacion/coti/', [CotizacionController::class,'FinalizarCotizacion'])->name('cotizacion.finalizar')->middleware('rol');
Route::post('cotizacion/proceso/', [CotizacionController::class,'cotiproducto'])->name('proceso')->middleware('rol');
Route::post('cotizacion/cliente/', [CotizacionController::class,'store_cliente'])->name('cotizacion.store_cliente')->middleware('rol');
Route::post('emp/metpago/', [EmpresaController::class,'empmetpago'])->name('empresa.empmetpago');

//select 2
Route::post('regiones', [RegionController::class,'ajax'])->name('ajax');
Route::post('/roles', [RoleController::class,'ajax'])->name('ajax.rol');
Route::post('comunas', [ComunaController::class,'ajax'])->name('comunas');
Route::post('res/productos', [ProductoController::class,'ajax'])->name('ajax.producto');
Route::post('sub_categorias', [CategoriaController::class,'ajax'])->name('sub_categorias');
Route::post('emp', [EmpresaController::class,'ajax'])->name('empresa.ajax');
Route::post('cli', [ClienteController::class,'ajax'])->name('clientes.ajax');
Route::post('cot', [CotizacionController::class,'ajax'])->name('cotizacion.ajax');
Route::post('notv', [NotadeventaController::class,'ajax'])->name('notadeventa.ajax');
Route::post('met', [MetododepagoController::class,'ajax'])->name('metododepago.ajax');
Route::post('fmp', [FormadepagoController::class,'ajax'])->name('formadepago.ajax');
Route::post('met_estado', [MetododepagoController::class,'ajax_estado'])->name('metododepago.ajax_estado');
Route::post('empmet', [EmpresaController::class,'ajax_empmetpago'])->name('empresa.ajax_empmetpago');
Route::post('appay_estado', [MetododepagoController::class,'ajax_estadoappay'])->name('metododepago.ajax_estadoappay');
Route::post('empresa/estado', [EmpresaController::class,'status'])->name('empresa.estado');
Route::post('producto/find', [ProductoController::class,'findproducto'])->name('producto.find');
Route::post('cotizacion/estado', [CotizacionController::class,'status'])->name('cotizacion.estado');
Route::post('metodo/estado', [MetododepagoController::class,'status'])->name('metododepago.estado');
Route::post('notadeventa/estado', [NotadeventaController::class,'status'])->name('notadeventa.estado');
Route::post('confappy/estado', [MetododepagoController::class,'statusappay'])->name('metododepago.estado_confappay');
Route::post('cliente/estado', [ClienteController::class,'status'])->name('cliente.estado');
Route::post('producto/stock', [ProductoController::class,'stock'])->name('producto.stock');
Route::post('sucursalcan', [SucursaleController::class,'cantidad'])->name('sucursalcan');
Route::post('findrespuesta', [RespuestaController::class,'findrespuesta'])->name('respuesta.find');

//deshabilitar
Route::post('usuario',[UsuarioController::class,'delete'])->name('usuarios.delete')->middleware('rol');
Route::post('categoria',[CategoriaController::class,'delete'])->name('categorias.delete')->middleware('rol');
Route::post('producto',[ProductoController::class,'delete'])->name('productos.delete')->middleware('rol');
Route::post('cliente',[ClienteController::class,'delete'])->name('clientes.delete')->middleware('rol');
Route::post('auth',[RoleController::class,'delete'])->name('roles.delete')->middleware('rol');
Route::post('empresa',[EmpresaController::class,'delete'])->name('empresas.delete')->middleware('rol');
Route::post('cotizacionproducto',[CotizacionController::class,'delete_producto'])->name('cotizacionproducto.delete')->middleware('rol');
Route::post('cotizacion',[CotizacionController::class,'delete'])->name('cotizacion.delete')->middleware('rol');
Route::post('venta',[CotizacionController::class,'delete'])->name('ventas.delete')->middleware('rol');
Route::post('notadeventa',[NotadeventaController::class,'delete'])->name('notadeventas.delete')->middleware('rol');

//eliminar


//habilitar
Route::post('categorias/enable', [CategoriaController::class,'enable'])->name('categorias.enable')->middleware('rol');
Route::post('productos/enable', [ProductoController::class,'enable'])->name('productos.enable')->middleware('rol');
Route::post('clientes/enable', [ClienteController::class,'enable'])->name('clientes.enable')->middleware('rol');
Route::post('roles/enable', [RoleController::class,'enable'])->name('roles.enable')->middleware('rol');
Route::post('empresas/enable', [EmpresaController::class,'enable'])->name('empresas.enable')->middleware('rol');
Route::post('usuarios/enable', [UsuarioController::class,'enable'])->name('usuarios.enable')->middleware('rol');

// Conexiones externas
Route::get('/Get/Familias', [ApiController::class,'Get_Familia'])->name('get.familias');
Route::get('/Get/Clientes', [ApiController::class,'Get_Cliente'])->name('get.clientes');
Route::get('/Get/Subfamilias', [ApiController::class,'Get_Subfamilias'])->name('get.subfamilias');
Route::get('/Get/Productos', [ApiController::class,'Get_Productos'])->name('get.productos');
Route::get('/Get/Formapagos', [ApiController::class,'Get_Formapagos'])->name('get.formapago');
Route::get('/Get/Bodegas', [ApiController::class,'Get_Bodegas'])->name('get.bodega');
Route::get('/Get/Sucursales', [ApiController::class,'Get_Sucursales'])->name('get.siucursal');
Route::get('/Get/Direcciones', [ApiController::class,'Get_Direcciones'])->name('get.direccion');
Route::get('/Get/Inventario', [ApiController::class,'Get_Inventario'])->name('get.inventario');

// Configuracion de de metodos de pago
Route::get('metododepago/configuracion/{id}', [MetododepagoController::class,'configuracion'])->name('metododepagos.configuracion')->middleware('rol');
Route::get('metododepago/web', [MetododepagoController::class,'indexweb'])->name('metododepagos.web')->middleware('rol');
Route::get('metododepago/fisico', [MetododepagoController::class,'indexfisico'])->name('metododepagos.fisico')->middleware('rol');
Route::post('met/conf', [MetododepagoController::class,'metconf'])->name('metododepago.metconf')->middleware('rol');
Route::post('metpago/registros', [MetododepagoController::class, 'registros'])->name('metpago/registros')->middleware('rol');

//configuracion de plataformas


//rutas de landing

Route::get('/orden/{codigo}', [LandingController::class, 'verorden'])->name('consultaorden');
Route::get('validarOrden', [LandingController::class, 'validarOrden'])->name('validarOrden');
Route::get('/estadoordencodigo', [LandingController::class, 'verordenpostcodigo'])->name('estadoordencodigo');

//reset cache

Route::get('/clear-cache', function() {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    $run = Artisan::call('route:clear');
    return 'FINISHED';
});

//PDF
Route::get('/pdf/cotizacion/{cotizacion}', [CotizacionController::class,'PDF'])->name('cotizacion.pdf');
Route::get('/pdf/notadeventa/{cotizacion}', [NotadeventaController::class,'PDF'])->name('notadeventa.pdf');
Route::get('/orden/pdf','VentaController@pdf_orden')->name('pdf.orden');

/** Zona de listas **/
//Ventas
Route::post('ventas/registros', [VentaController::class, 'registros'])->name('ventas/registros');
//Cotizaciones
Route::post('cotizaciones/registros', [CotizacionController::class, 'registros'])->name('cotizaciones/registros');
//Nota de ventas
Route::post('notadeventas/registros', [NotadeventaController::class, 'registros'])->name('notadeventas/registros');
//productos
Route::get('producto/registros', [ProductoController::class, 'registros'])->name('producto/registros');
//usuarios
Route::get('usuario/registros',[UsuarioController::class,'registros'])->name('usuario/registros');
//autoatencionfichas
Route::post('autoatencion/registros', [AutoatencionController::class, 'registrosfichas'])->name('autoatencionficha/registros');
//sucursales
Route::post('sucursales/registros', [SucursaleController::class, 'registros'])->name('sucursales/registros');
//autoatencion
Route::post('autoatencion/registros', [AutoatencionController::class, 'registros'])->name('autoatenciones/registros');
//Autoatencionficha
Route::post('autoatencionficha/registros', [AutoatencionController::class, 'registrosfichas'])->name('autoatencionfichas/registros');
//Categorias
Route::get('familia/registros', [CategoriaController::class, 'registros'])->name('familias/registros');

/** Fin Zona listas **/

//Autoatencionficha


//Dinsen
Route::get('Dinsen/Navidad/{lan_nombre}', [PlataformaController::class,'landing_vista'])->name('dinsen.landing');
Route::post('validastock', [SucursaleController::class,'validastock'])->name('validastock');

//import 
Route::post('pro_import',[ProductoController::class, 'importexcel'])->name('productos.import');
Route::get('pro_ejemplo',[ProductoController::class, 'importejemplo'])->name('productos.import_ejemplo');

//usuario cambio credenciales
Route::post('usuchange',[UsuarioController::class,'resetacces'])->name('usuarios.changepass');