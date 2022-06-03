<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
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
            'hora_final'=> 'required |date_format:H:i|after:hora_inicio',
            'estado'=> 'required',
            'cliente'=> 'required',
            'empleado'=> 'required',
            'especialidad' => 'required',
            'lugar' => 'required',
            'hora_cita' => 'required |date_format:H:i|after_or_equal:hora_inicio|before:hora_final'
        ];
    }
    public function messages(){
        return[
            'fecha.required' => 'La fecha es obligatoria',
            'fecha.date_format '=> 'Formato incorrecto',
            'hora_inicio.required' => 'La hora de inicio es obligatoria',
            'hora_inicio.date_format '=> 'Formato incorrecto',
            'hora_final.required' => 'La hora final es obligatoria',
            'hora_final.date_format '=> 'Formato incorrecto',
            'hora_final.after'=> 'La hora final no puede ser anterior a la hora de inicio.',
            'estado.required' => 'El estado es obligatorio',
            'cliente.required' => 'El campo cliente es obligatorio',
            'empleado.required' => 'El campo empleado es obligatorio',
            'especialidad.required' => 'El campo especialidad es obligatorio',
            'lugar.required' => 'El campo lugar es obligatorio',
            'hora_cita.required' => 'La hora de la cita es obligatoria',
            'hora_cita.date_format '=> 'Formato incorrecto',
            'hora_cita.before'=> 'La hora de la cita debe ser anterior a la hora final.',
            'hora_cita.after'=> 'La hora de la cita no puede ser anterior a la hora de inicio.',

        ];
    }
}
