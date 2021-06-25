<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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
        //dd($this);
        switch($this->method()){
            case 'POST':
            {
                return [
                    'cli_nombre' => [
                        'required', 'min:5','max:100','unique:clientes'
                    ],
                    'cli_contacto' => [
                        'required', 'min:5','max:100'
                    ],
                    'cli_telefono' => [
                        'required', 'size:9','unique:clientes'
                    ],
                    'cli_email' => [
                        'required', 'min:5','max:100','unique:clientes','email'
                    ],
                    'cli_direccion' => [
                        'required', 'min:15', 'max:300'
                    ],
                    'cli_dui' => [
                    ],
                    'cli_nit' => [
                        'required', 'size:17','unique:clientes'
                    ],
                    'cli_nrc' => [
                        'required', 'size:6','unique:clientes'
                    ],
                    'cli_categoria' => [
                        'required'
                    ]
                ];
            }
            case 'PUT':
            {
                return [
                    'cli_nombre' => [
                        'required', 'min:5','max:100', Rule::unique('clientes')->ignore($this->id_validate),
                    ],
                    'cli_contacto' => [
                        'required', 'min:5','max:100'
                    ],
                    'cli_telefono' => [
                        'required', 'size:9', Rule::unique('clientes')->ignore($this->id_validate),
                    ],
                    'cli_email' => [
                        'required', 'min:5','max:100','email', Rule::unique('clientes')->ignore($this->id_validate),
                    ],
                    'cli_direccion' => [
                        'required', 'min:20', 'max:300'
                    ],
                    'cli_dui' => [
                        Rule::unique('clientes')->ignore($this->id_validate),
                    ],
                    'cli_nit' => [
                        'required', 'size:17', Rule::unique('clientes')->ignore($this->id_validate),
                    ],
                    'cli_nrc' => [
                        'required', 'size:6', Rule::unique('clientes')->ignore($this->id_validate),
                    ],
                    'cli_categoria' => [
                        'required'
                    ]
                ];
            }
            default:break;
            // Rule::unique('clientes')->ignore($this->id_validate)
        }
    }

    public function attributes()
    {
        return [
            'cli_nombre' => 'nombre',
            'cli_contacto' => 'contacto',
            'cli_telefono' => 'teléfono',
            'cli_email' => 'email',
            'cli_direccion' => 'dirección',
            'cli_dui' => 'DUI',
            'cli_nit' => 'NIT',
            'cli_nrc' => 'NRC',
            'cli_categoria' => 'categoría de contribuyente'
        ];
    }
}
