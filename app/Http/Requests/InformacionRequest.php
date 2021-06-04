<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformacionRequest extends FormRequest
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
            'info_nombre' => [
                'required', 'min:5','max:100'
            ],
            'info_direccion' => [
                'required', 'min:5','max:100'
            ],
            'info_telefono' => [
                'required'
            ],
            'info_correo' => [
                'required', 'min:5','max:50'
            ],
            'info_nit' => [
                'required', 'size:17'
            ],
            'info_nrc' => [
                'required', 'min:5','max:50'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'info_nombre' => 'nombre',
            'info_direccion' => 'dirección',
            'info_telefono' => 'teléfono',
            'info_correo' => 'correo',
            'info_nit' => 'NIT',
            'info_nrc' => 'NRC',
        ];
    }
}