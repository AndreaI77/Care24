<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
            'nombre'=> 'required',
            'apellidos'=> 'required',
            'tel'=> 'required | numeric',
            'mensaje'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=> 'Nombre es obligatorio',
            'apellidos.required'=> 'El campo apelllidos es obligatorio',
            'tel.required'=> 'El teléfono es obligatorio',
            'tel.numeric'=> 'El teléfono debe tener un valor numérico',
            'mensaje.required'=> 'El mensaje es obligatorio'
        ];
    }
}
