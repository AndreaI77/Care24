<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            'nombre'=> 'required | min:2',
            'apellido'=> 'required | min:3',
            'domicilio'=> 'required | min: 10',
            'DNI'=> 'required | unique:App\Models\User,dni,'.$this->user_id.',id',
            'email'=> 'required | email',
            'tel'=> 'required | numeric',
            'puesto'=> 'required',
            'fecha_nacimiento'=> 'nullable | date_format:Y-m-d | before:today | after:1900-01-01',
            'fecha_baja' => 'nullable | date_format:Y-m-d | after_or_equal:'.$this->fecha_alta
        ];
    }
    public function messages(){
        return[
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min:2' => ' El nombre debe tener al menos 2 carácteres',
            'apellido.required' => 'El apellido es obligatorio',
            'apellido.min:3' => ' El apellido debe tener al menos 3 carácteres',
            'domicilio.required' => 'El domicilio es obligatorio',
            'domicilio.min:10' => ' El domicilio debe tener al menos 10 carácteres',
            'DNI.required' => 'El DNI/NIE es obligatorio',
            'DNI.unique' => 'Este DNI/NIE ya está registrado',
            'email.required' => 'El email es obligatorio',
            'fecha_nacimiento.before' => 'Fecha de nacimiento no puede ser posterior a hoy',
            'fecha_nacimiento.after' => 'Fecha de nacimiento no puede ser anterior a 1900',
            'tel.required' => 'El teléfono es obligatorio',
            'tel.numeric' => 'El teléfono no es válido',
            'puesto.required' => 'Debe elegir la categoría del empleado',
            'fecha_baja.after_or_equal'=> 'La fecha de baja no puede ser anterior a la fecha de alta.'
        ];
    }
}
