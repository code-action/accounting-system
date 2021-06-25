<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProveedorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()){
            case 'POST':
            {
                return [
                    'prov_nombre' => [
                        'required', 'min:5','max:100','unique:proveedors'
                    ],
                    'prov_encargado' => [
                        'required', 'min:5','max:100'
                    ],
                    'prov_telefono' => [
                        'required', 'size:9','unique:proveedors'
                    ],
                    'prov_email' => [
                        'required', 'min:5','max:100','unique:proveedors','email'
                    ],
                ];
            }
            case 'PUT':
            {
                return [
                    'prov_nombre' => [
                        'required', 'min:5','max:100',Rule::unique('proveedors')->ignore($this->id_validate),
                    ],
                    'prov_encargado' => [
                        'required', 'min:5','max:100'
                    ],
                    'prov_telefono' => [
                        'required', 'size:9',Rule::unique('proveedors')->ignore($this->id_validate),
                    ],
                    'prov_email' => [
                        'required', 'min:5','max:100','email',Rule::unique('proveedors')->ignore($this->id_validate),
                    ],
                ];
            }
            default:break;
        }
    }
    public function attributes()
    {
        return [
            'prov_nombre' => 'nombre',
            'prov_encargado' => 'encargado',
            'prov_telefono' => 'teléfono',
            'prov_email' => 'email',
        ];
    }
}