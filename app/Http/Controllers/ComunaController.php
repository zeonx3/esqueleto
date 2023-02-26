<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ComunaController
 * @package App\Http\Controllers
 */
class ComunaController extends Controller
{
    public function ajax()
    {
        $this->Response = [
            'Status' => 1,
            'Message' => 'OK'
        ];

        switch ($_SERVER['REQUEST_METHOD']) 
        {
            case "POST":

                $id_region = isset($_POST['id_region']) ? (int)$_POST['id_region'] : 0;
                $term = isset($_POST['q']) ? trim($_POST['q']) : null;

                $items = [];

                if ($id_region != 0)
                {
                    $comuna_set = DB::table('comunas')
                                    ->where('id_region','=', $id_region);
                                   
                    if (!is_null($term))
                    {
                        $comuna_set = $comuna_set->Where(" comunas.com_nombre LIKE '%'".$term."'%' ");
                    }

                    $comunas_rs = $comuna_set
                        ->groupBy('comunas.id')
                        ->get();

                   

                    foreach ($comunas_rs as $comuna) 
                    {                       
                        $items[] = [
                            'id' => $comuna->id,
                            'text' => $comuna->com_nombre
                        ];     

                    }
                }
                
                $this->Response['items'] = $items;
                $this->Response['page'] = (int)$_POST['page'];
                break;

            default:
                $this->Response['Status'] = 0;
                $this->Response['Message'] = 'Methodo no definido';
                break;
        }

         return response()->json($this->Response);
        

    }

   
}
