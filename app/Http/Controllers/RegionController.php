<?php

namespace App\Http\Controllers;

use App\Models\Paises;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
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

                $id_pais = isset($_POST['id_pais']) ? (int)$_POST['id_pais'] : 0;
                $term = isset($_POST['q']) ? trim($_POST['q']) : null;

                $items = [];
                $n = 0;

                if ($id_pais != 0)
                {
                    $region_set = DB::table('regiones')
                                    ->where('id_pais','=', $id_pais);
                                   
                    if (!is_null($term))
                    {
                        $region_set = $region_set->Where("reg_nombre","LIKE","%".$term."%");
                    }

                    $region_rs = $region_set
                        ->groupBy('regiones.id')
                        ->get();

                    foreach ($region_rs as $region) 
                    {                       
                        $items[] = [
                            'id' => $region->id,
                            'text' => $region->reg_nombre
                        ];     

                    }
                }
                
                $this->Response['items'] = $items;
                $this->Response['page'] = (int)$_POST['page'];
                break;

            default:
                $this->Response['Status'] = 0;
                $this->Response['Message'] = 'Metodo no definido';
                break;
        }

         return response()->json($this->Response);
        

    }


}
