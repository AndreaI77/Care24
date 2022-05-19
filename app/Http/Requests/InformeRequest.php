<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformeRequest extends FormRequest
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
            'estado'=> 'required',
            'titulo' => 'required',
            'descripcion' => 'required'
        ];
    }
    public function messages(){
        return[
            'estado.required' => 'El estado es obligatorio',
            'titulo.required' => 'El título es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio'

        ];
    }
}
