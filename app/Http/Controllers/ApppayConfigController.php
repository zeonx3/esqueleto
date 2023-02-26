<?php

namespace App\Http\Controllers;

use App\Models\ApppayConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApppayConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id_user = Auth::id();
        $apppayConfig = ApppayConfig::where('user_id',$id_user)->first();

        return view('apppay-config.edit', compact('apppayConfig'));
       
    }


    public function create()
    {
        $apppayConfig = new ApppayConfig();

        return view('apppay-config.create', compact('apppayConfig'));
    }

    public function store(Request $request)
    {
        
        request()->validate(ApppayConfig::$rules);

        $apppayConfig = ApppayConfig::create($request->all());

        return redirect()->route('apppay-configs.index')
            ->with('success', 'ApppayConfig created successfully.');
    }


    public function show($id)
    {
        $apppayConfig = ApppayConfig::find($id);

        return view('apppay-config.show', compact('apppayConfig'));
    }

    public function edit($id)
    {
        //$apppayConfig = ApppayConfig::find($id);
        

        $apppayConfig = ApppayConfig::where('user_id',$id)->first();

        return view('apppay-config.edit', compact('apppayConfig'));
    }



    public function update(Request $request,$apppayConfig)
    {
        //dd($request,$apppayConfig);

        $id_user = Auth::id();
        //dd($request);
        $request->validate(ApppayConfig::$rules);

        ApppayConfig::where('id',$apppayConfig)->where('user_id',$id_user)->update(
            ['token_mach'=>$request['token_mach'],
            'api_key_flow'=>$request['api_key_flow'],
            'secret_key_Flow'=>$request['secret_key_Flow'],
            'activo_mach'=>$request['activo_mach'],
            'activo_flow'=>$request['activo_flow']]);

            
        
        //dd($request);
        return redirect()->route('pagos.index')
            ->with('success', 'ApppayConfig updated successfully');
    }


    public function destroy($id)
    {
        $apppayConfig = ApppayConfig::find($id)->delete();

        return redirect()->route('apppay-configs.index')
            ->with('success', 'ApppayConfig deleted successfully');
    }
}
