<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApppayConfig;
use App\Models\User;

class ApppayConfigApiController extends Controller
{
    public function getConfig(Request $request)
    {
        $token = $request->bearerToken();
        
        //dd($token);
        $id_user= User::where('token',$token)->value('id');
        //dd($user);
        $apppayConfig = ApppayConfig::select('token_mach','api_key_flow','secret_key_Flow','activo_mach','activo_flow')->where('user_id',$id_user)->first();

        return response()->json([
            'config'=>$apppayConfig,
        ]);
    }
}
