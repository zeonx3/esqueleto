<?php

namespace App\Http\Controllers;

use App\Models\AppdespConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AppdespConfigController
 * @package App\Http\Controllers
 */
class AppdespConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id_user = Auth::id();
        $appdespConfig = AppdespConfig::where('user_id', $id_user)->first();
        return view('appdesp-config.edit', compact('appdespConfig'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appdespConfig = new AppdespConfig();
        return view('appdesp-config.create', compact('appdespConfig'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AppdespConfig::$rules);

        $appdespConfig = AppdespConfig::create($request->all());

        return redirect()->route('appdesp-configs.index')
            ->with('success', 'AppdespConfig created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appdespConfig = AppdespConfig::find($id);

        return view('appdesp-config.show', compact('appdespConfig'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appdespConfig = AppdespConfig::where('user_id', $id)->first();

        return view('appdesp-config.edit', compact('appdespConfig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AppdespConfig $appdespConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $appdespConfig)
    {
        $id_user = Auth::id();

        AppdespConfig::where('id', $appdespConfig)->where('user_id', $id_user)->update(
                ['direccion_remitente' => $request['direccion_remitente']],
                ['telefono_remitente' => $request['telefono_remitente']]
            );

        return redirect()->route('despachos.index')
            ->with('success', 'AppdespConfig updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $appdespConfig = AppdespConfig::find($id)->delete();

        return redirect()->route('appdesp-configs.index')
            ->with('success', 'AppdespConfig deleted successfully');
    }
}
