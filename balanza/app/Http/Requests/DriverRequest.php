<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'rif'   =>  'required|unique:drivers',
            'name'  =>  'required',
            // 'phone'  =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'rif.unique'        =>  'Ya existe un chofer con esta cedula.',
            'rif.required'      =>  'Debe ingresar un rif.',
            'name.required'     =>  'Debe ingresar un nombre.',
            // 'phone.required'    =>  'Debe ingresar un telefono'
        ];
    }
}
