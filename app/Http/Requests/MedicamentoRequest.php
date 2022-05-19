<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentoRequest extends FormRequest
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
            'principio'=>'required',
            'cantidad' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=> 'Nombre es obligatorio',
            'principio.required'=> 'Principio activo es obligatorio',
            'cantidad.required'=> 'Cantidad es obligatoria'
        ];
    }
}
