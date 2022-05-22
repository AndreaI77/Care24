<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidenciaRequest extends FormRequest
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
            'fecha' => 'required|date_format:Y-m-d|before_or_equal:today',
            'estado'=> 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'cliente' => 'required',
            'tipo' => 'required'
        ];
    }
    public function messages(){
        return[
            'fecha.required' => 'La fecha es obligatoria',
            'fecha.before_or_equal' => 'La fecha no puede ser posterior a hoy',
            'estado.required' => 'El estado es obligatorio',
            'cliente.required' => 'El campo cliente es obligatorio',
            'tipo.required' => 'El tipo es obligatorio',
            'titulo.required' => 'El título es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio'

        ];
    }
}
