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
                ];
            }
            case 'PUT':
            {
                return [
                    'cli_nombre' => [
                        'required', 'min:5','max:100',Rule::unique('clientes')->ignore($this->id_validate),
                    ],
                    'cli_contacto' => [
                        'required', 'min:5','max:100'
                    ],
                    'cli_telefono' => [
                        'required', 'size:9',Rule::unique('clientes')->ignore($this->id_validate),
                    ],
                    'cli_email' => [
                        'required', 'min:5','max:100','email',Rule::unique('clientes')->ignore($this->id_validate),
                    ],
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
        ];
    }
}
