<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TratamientoRequest extends FormRequest
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
            'medicamento'=> 'required',
            'cliente'=> 'required',
            'fecha_principio'=>'required |date_format:Y-m-d',
            'fecha_fin'=>'nullable |date_format:Y-m-d| after:fecha_principio',
            'hora'=> 'required |date_format:H:i',
            'cantidad' => 'required | numeric'
        ];
    }
    public function messages()
    {
        return [
            'medicamento.required'=> 'Medicamento es obligatorio',
            'cliente.required'=> 'Cliente es obligatorio',
            'fecha_principio.required'=> 'La fecha de principio es obligatoria',
            'fecha_fin.after'=> 'La fecha final debe ser posterior a la fecha de principio',
            'hora,required' => 'La hora de la toma es obligatoria',
            'cantidad.required' => 'La cantidad es obligatoria',
            'cantidad.numeric' => 'La cantidad debe ser un valor numérico'
        ];
    }
}
