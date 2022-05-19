<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            'fecha'=> 'required |date_format:Y-m-d',
            'hora_inicio'=> 'required |date_format:H:i',
            'hora_final'=> 'required |date_format:H:i| after:hora_inicio',
            'tipo'=> 'required',
            'estado'=> 'required',
            'cliente'=> 'required',
            'empleado'=> 'required'
        ];
    }
    public function messages(){
        return[
            'fecha.required' => 'La fecha es obligatoria',
            'fecha.date_format '=> 'Formato incorrecto',
            'hora_inicio.required' => 'La hora de inicio es obligatoria',
            'hora_inicio.date_format '=> 'Formato incorrecto',
            'hora_final.required' => 'La hora de inicio es obligatoria',
            'hora_final.date_format '=> 'Formato incorrecto',
            'tipo.required' => 'El tipo es obligatorio',
            'estado.required' => 'El estado es obligatorio',
            'cliente.required' => 'El campo cliente es obligatorio',
            'empleado.required' => 'El campo empleado es obligatorio',
            'hora_final.after'=> 'La hora final no puede ser anterior a la hora de inicio.'
        ];
    }
}
