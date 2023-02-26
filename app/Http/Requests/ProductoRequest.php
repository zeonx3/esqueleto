<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'pro_nombre'    =>  'required',
            'pro_tipo'  =>  'required',
            'pro_descripcion' =>    'required',
           /*  'pro_neto' =>   'required',
            'pro_bruto' =>  'required', */
            'pro_exento' => 'required',
            'pro_pesable' =>    'required',
            'pro_uni_medida' => 'required',
            'pro_sku' =>    'required',
            'pro_int_esp' =>    'required',
            /* 'pro_imagen' => 'required', */
            'pro_codbarra' =>   'required',
            /* 'pro_costo' =>  'required', */
            'id_categoria' =>   'required',
            'id_sub_categoria' => 'required',
           /*  'pro_estado' => 'required', */
           /*  'pro_venta' =>  'required' */



        ];
    }


    public function messages()
    {
        return[

            'pro_nombre.required' => 'Debe ingresar el nombre',
            'pro_tipo.required' => 'Debe ingresar el tipo de producto',
            'pro_descripcion.required' =>    'Debe ingresar una descripción',
           /*  'pro_neto' =>   'required',
            'pro_bruto' =>  'required', */
            'pro_uni_medida.required' => 'Debe seleccionar la unidad de medida',
            'pro_sku.required' =>    'Debe ingresar el codigo del producto',
        
            /* 'pro_imagen' => 'required', */
            'pro_codbarra.required' =>   'Debe ingresar el codigo de barra',
            /* 'pro_costo' =>  'required', */
            'id_categoria.required' =>   'Debe seleccionar la categoria',
           /*  'pro_estado' => 'required', */
           /*  'pro_venta' =>  'required' */

        ];
    }
}
