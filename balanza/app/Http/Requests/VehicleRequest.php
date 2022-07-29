<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'number_plate'  =>  'required|unique:vehicles',
            'brand'         =>  'required',
            'model'         =>  'required'
        ];
    }

    public function messages()
    {
        return[
            'number_plate.required' =>  'Debe ingresar una placa del vehiculo',
            'number_plate.unique'   =>  'Esta placa ya existe',
            'brand.required'        =>  'Debe ingresar la marca del vehiculo',
            'model.required'        =>  'Debe ingresar el modelo'
        ];
    }
}
