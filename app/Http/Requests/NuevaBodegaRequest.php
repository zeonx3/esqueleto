<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NuevaBodegaRequest extends FormRequest
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

            'bod_nombre' => 'required',
            'bod_retiro' => 'required',
            'id_empresa' => 'required',
            'id_pais' => 'required',
            'id_region' => 'required',
            'id_comuna' => 'required',
            'bod_calle' => 'required',
            'bod_num_calle' => 'required'

        ];
    }

    public function messages()
    {
        return [

            'bod_nombre.required' => 'Se debe ingresar el nombre',
            'bod_retiro.required' => 'Se debe ingresar el tipo de retiro',
            'id_empresa.required' => 'Se debe ingresar la empresa',
            'id_pais.required' => 'Se debe ingresar el pais',
            'id_region.required' => 'Se debe ingresar la region',
            'id_comuna.required' => 'Se debe ingresar la comuna',
            'bod_calle.required' => 'Se debe ingresar la calle',
            'bod_num_calle.required' => 'Se debe ingresar la numeracion'

        ];
    }
}
