<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Pago;
use App\Models\User;

class PagoApiController extends Controller
{
    public function registrar(Request $request)
    {
        $token = $request->bearerToken();
        
        $id_user= User::where('token',$token)->value('id');


        $validated=$request->validate(Pago::$rules);

        $pago = Pago::create([
            'codigo' => $validated['codigo'],
            'correo' => $request->correo,
            'data_qr' => $validated['data_qr'],
            'estado' => $validated['estado'],
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'],
            'monto' => $validated['monto'],
            'numero_orden' => $validated['numero_orden'],
            'tipo' => $validated['tipo'],
            'user_id' => $id_user,
        ]);


        if(!$pago)
        {
            return response()->json(['respuesta'=>'Error al Crear'], 400);
        }

        return response()->json(['respuesta'=>'Creado Exitosamente'], 202);

    }

    public function confirmarflow(Request $request)
    {
        $token = $request['token'];

        //$id = 1;
        //codigo = token en el caso de flow o lo k sea, nnumero orden seria el codigo asignado
  
        $pago = Pago::select('estado', 'codigo', 'id','data_qr','monto','fecha','hora','tipo','numero_orden','user_id')->where('codigo', $token)->first();
  
        if ($pago->estado == 'pendiente') {

            $config = Configuration::select('api_key_flow', 'secret_key_Flow')->where('user_id', $pago->user_id)->first();
  
            $secretKey = $config->secret_key_Flow;
  
            $params = array(
                'apiKey' => $config->api_key_flow,
                'token' => $token,
            );
  
            $keys = array_keys($params);
            sort($keys);
  
            $toSign = "";
            foreach ($keys as $key) {
                $toSign .= $key . $params[$key];
            };
  
            $signature  = hash_hmac('sha256', $toSign, $secretKey);
  
            $url = 'https://sandbox.flow.cl/api';
            $url = $url . '/payment/getStatus';
            $params["s"] = $signature;
            $url = $url . "?" . http_build_query($params);
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                $response = curl_exec($ch);
                if ($response === false) {
                    $error = curl_error($ch);
                    throw new Exception($error, 1);
                }
                $info = curl_getinfo($ch);
                if (!in_array($info['http_code'], array('200', '400', '401'))) {
                    throw new Exception('Unexpected error occurred. HTTP_CODE: ' . $info['http_code'], $info['http_code']);
                }
                //echo $response;
            } catch (Exception $e) {
                //echo 'Error: ' . $e->getCode() . ' - ' . $e->getMessage();
            }
  
            $response = json_decode($response);
  
            //dd($response);
  
            switch ($response->status) {
                case 2:
                    $venta->estado='completado';
                    
                    //dd($config);
                    $venta->save();
                   // $this->send_mail($venta);
  
                    break;
                case 3:
                    $venta->estado='rechazado';
                    $venta->save();
  
                    break;
                case 4:
                    $venta->estado='anulado';
                    $venta->save();
                    break;
            }
        }


        return response('recibido', 200)
        ->header('Content-Type', 'text/plain');
    }

    public function listapagos(Request $request)
    {

        $token = $request->bearerToken();
        
        $id_user= User::where('token',$token)->value('id');
        
        //dd($id_user);

        $lista= Pago::where('user_id',$id_user);

        dd($lista);

        return response()->json([
            'lista'=>$lista,
        ]);
       


    }
}
