<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginPost(Request $request ,Redirector $redirect) 
    {
        $remember = $request->filled('remember');

        $empresa = Empresa::where('emp_rut',$request->emp_rut)->first();

        if(is_null($empresa))
        {
            return back()->withErrors(['emp_rut' => 'Empresa no registrada']);
        }
        elseif($empresa->emp_estado == 0)
        {
            return back()->withErrors(['emp_rut' => 'Empresa deshabilitada']);
        }

        $user = DB::table('usuarios')->where('usu_username',$request['usu_username'])->first();

        if(is_null($user))
        {
            return back()->withErrors(['usu_username' => 'Credenciales invalidas']);
        }

        $emp_aut = DB::table('usuarioempresas')->where('id_empresa',$empresa->id)->where('id_usuario',$user->id)->first();
        
        if(is_null($emp_aut))
        {
            Auth::logout();
            return back()->withErrors(['usu_username' => 'Credenciales invalidas']);
        }

        if( Auth::attempt([
            'usu_username' => $request['usu_username'],
            'password' => $request['password'],
            'usu_estado' => 1
        ]) && $remember){
           
        $request->session()->regenerate();

        $user = User::where('usu_username',$request->usu_username)->firstOrFail();


        if(is_null($user->usu_token))
        {
            $token = $user->createToken("auth_token")->plainTextToken;
            $user->usu_token = $token;
            $user->save();
        }

            return $redirect->route('dashboard');
        
       }
       
       throw ValidationException::withMessages([

            'usu_username'  => __('auth.failed')
    
       ]);

    }

    public function logout(Request $request ,Redirector $redirect)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return $redirect->to('/')->with('status', 'has cerrado la sesion');
    }

    public function PasswordReset(Redirector $redirect)
    {

        return $redirect->to('password/reset');

    }

}


