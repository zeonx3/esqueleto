<?php

namespace App\Http\Controllers;

use App\Http\Requests\NuevaBodegaRequest;
use App\Models\Bodega;
use App\Models\Direccione;
use App\Models\Empresa;
use App\Models\Paises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class BodegaController
 * @package App\Http\Controllers
 */
class BodegaController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $bodegas = DB::table('bodegas')
                        ->join('empresas','bodegas.id_empresa','=','empresas.id')
                        ->join('direcciones','bodegas.id_direccion','=','direcciones.id')
                        ->join('comunas', 'direcciones.id_comuna','=','comunas.id')
                        ->join('regiones','comunas.id_region','=','regiones.id')
                        ->join('paises','regiones.id_pais','=','paises.id')
                        ->get();
        

        return view('bodega.index', compact('bodegas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodega = new Bodega();
        $direccion = new Direccione();
        $pais = Paises::all();
        $empresa = Empresa::all();

        return view('bodega.create', compact('pais','bodega','empresa'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NuevaBodegaRequest $request)
    {
        
        var_dump($request->validated());
        die;

        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bodega = DB::table('bodegas')
                        ->join('empresas','bodegas.id_empresa','=','empresas.id')
                        ->join('direcciones','bodegas.id_direccion','=','direcciones.id')
                        ->where('bodegas.id','=', $id)
                        ->groupBy('bodegas.id')
                        ->get();

        return view('bodega.show', ['bodega' => $bodega]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bodega = Bodega::find($id);

        return view('bodega.edit', compact('bodega'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bodega $bodega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodega $bodega)
    {
        request()->validate(Bodega::$rules);

        $bodega->update($request->all());

        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bodega = Bodega::find($id)->delete();

        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega deleted successfully');
    }
}
