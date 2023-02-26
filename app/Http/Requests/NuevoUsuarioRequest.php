<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class NuevoUsuarioRequest extends FormRequest
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
            
            'usu_nombre' => 'required',
            'usu_apellido' => 'required',
            'email' => ['required','unique:usuarios'],
            'usu_telefono' => 'required',
            'password' => 'required',
            'id_pais' => 'required',
            'id_region' => 'required',
            'id_comuna' => 'required',
            'usu_calle' => 'required',
            'usu_numcalle' => 'required',
            'archivo' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'usu_nombre.required' => 'Se debe ingresar el nombre',
            'usu_apellido.required' => 'Se debe ingresar el apellido',
            'email.required' => 'Se debe ingresar el correo',
            'email.unique' => 'El correo se encuentra registrado',
            'usu_telefono.required' => 'Se debe ingresar el telefono',
            'password.required' => 'Se debe ingresar la contraseña',
            'id_pais.required' => 'Se debe ingresar el pais',
            'id_region.required' => 'Se debe ingresar la region',
            'id_comuna.required' => 'Se debe ingresar la comuna',
            'usu_calle.required' =>  'Se debe ingresar la calle',
            'usu_num_calle.required' => 'Se debe ingresar la numeracion'
        ];
    }
}
