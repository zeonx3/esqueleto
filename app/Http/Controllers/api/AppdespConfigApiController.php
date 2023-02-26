<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppdespConfig;

class AppdespConfigApiController extends Controller
{
    public function getConfig(Request $request)
    {
        $user= $request->user();
        $id_user=$user->id;
        $appdespconfig = AppdespConfig::where('user_id',$id_user)->first();

        return response()->json([
            'config'=>$appdespconfig,
        ]);
    }
}
