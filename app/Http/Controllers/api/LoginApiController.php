<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginApiController extends Controller
{
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->json(['mensaje'=>'login invalido'],401);
        }
        
        $user = User::where('email',$request['email'])->firstOrFail();

        return response()->json([
            'user'=>$user,
        ]);
    }
}
