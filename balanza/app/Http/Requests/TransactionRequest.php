<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'input_weight'          =>  'required',
            'driver_rif'            =>  'required',
            'beneficiary_rif'       =>  'required',
            'number_plate_vehicle'  =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'input_weight.required'         => 'Debe Ingresar un peso de Entrada',
            'driver_rif.required'           => 'Debe Ingresar una cedula para el chofer',
            'beneficiary_rif.required'      => 'Debe ingresar un rif para el beneficiario',
            'number_plate_vehicle.required' => 'Debe ingresar la placa del vehiculo'
        ];
    }
}
