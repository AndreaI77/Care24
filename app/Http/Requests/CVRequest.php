<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CVRequest extends FormRequest
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
            'cv' => 'required | file| max:5000| mimes:pdf,docx,doc',
            'puesto' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=> 'Nombre es obligatorio',
            'apellidos.required'=> 'El campo apelllidos es obligatorio',
            'tel.required'=> 'El teléfono es obligatorio',
            'tel.numeric'=> 'El teléfono debe tener un valor numérico',
            'mensaje.required'=> 'El mensaje es obligatorio',
            'puesto.required'=> 'El puesto es obligatorio',
            'cv.required'=> 'Adjunta Archivo',
            'cv.mimes' => 'Tipo de archivo incorrecto',
            'cv.max'=> 'Se ha superado el tamaño máximo del archivo'
        ];
    }
}
