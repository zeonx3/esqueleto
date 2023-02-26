<?php

use App\Http\Controllers\api\AutoatencionApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LandingController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [ApiController::class, 'login'])->name('loginapi');

Route::post('estadoorden', [LandingController::class, 'verordenpost'])->name('estadoorden');

//Ventas flow
Route::post('/confirmacionflow', [LandingController::class, 'confirmarorden'])->name('confirmarflow');

Route::post('generandoorden', [LandingController::class,'crearorden'])->name('landing.generarorden');

Route::post('venta', [ApiController::class, 'venta']);


Route::group(['middleware' => ["auth:sanctum"]], function ()
{
    Route::get('productos', [ProductoController::class, 'get_productos']);
    Route::get('preguntas', [ApiController::class, 'get_preguntas']);
    Route::post('autfichas', [ApiController::class, 'get_autfichas']);
    Route::get('categoria_imagen', [ApiController::class, 'get_catimagen']);
    Route::post('respuestas', [ApiController::class, 'get_respuesta']);
    Route::get('categorias', [CategoriaController::class, 'get_categorias']);
    Route::post('totem_registros',[AutoatencionApiController::class,'interaccion']);

});