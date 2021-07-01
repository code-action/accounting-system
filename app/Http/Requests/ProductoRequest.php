<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
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
        switch($this->method()){
            case 'POST':
            {
                return [
                    'prod_codigo' => [
                        'required', 'min:3','max:100','unique:productos'
                    ],
                    'prod_nombre' => [
                        'required', 'min:3','max:100','unique:productos'
                    ],
                    'prod_cantidad' => [
                        'required', 'numeric','integer', 'min:1'
                    ],
                    'categoria_id' => [
                        'required'
                    ],
                    'prod_precio' => [
                        'required', 'numeric', 'min:0.01'
                    ],
                    'prod_descripcion' => [
                        'required', 'min:5'
                    ],
                    'prod_medida' => [
                        'required'
                    ],
                    'prod_empaque' => [
                        'required'
                    ],
                    'prod_contenido' => [
                        'required', 'numeric', 'min:0.01'
                    ],
                    'prod_proced' => [
                        'required', 'min:5'
                    ],
                ];
            }
            case 'PUT':
            {
                return [
                    'prod_codigo' => [
                        'required', 'min:3','max:100', Rule::unique('productos')->ignore($this->id_validate)
                    ],
                    'prod_nombre' => [
                        'required', 'min:3','max:100', Rule::unique('productos')->ignore($this->id_validate)
                    ],
                    'prod_cantidad' => [
                        'required', 'numeric','integer', 'min:1'
                    ],
                    'categoria_id' => [
                        'required'
                    ],
                    'prod_precio' => [
                        'required', 'numeric', 'min:0.01'
                    ],
                    'prod_descripcion' => [
                        'required', 'min:5'
                    ],
                    'prod_medida' => [
                        'required'
                    ],
                    'prod_empaque' => [
                        'required'
                    ],
                    'prod_contenido' => [
                        'required', 'numeric', 'min:0.01'
                    ],
                    'prod_proced' => [
                        'required', 'min:5'
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
            'prod_codigo' => 'código',
            'prod_nombre' => 'nombre',
            'prod_cantidad' => 'cantidad',
            'prod_precio' => 'precio',
            'categoria_id' => 'categoría',
            'prod_descripcion' => 'descripción',
            'prod_medida' => 'unidad de medida',
            'prod_empaque' => 'empaque',
            'prod_contenido' => 'contenido',
            'prod_proced' => 'procedimiento de elaboración'
        ];
    }
}
