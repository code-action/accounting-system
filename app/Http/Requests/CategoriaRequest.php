<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriaRequest extends FormRequest
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
                    'cat_nombre' => [
                        'required', 'min:3','max:60','unique:categorias'
                    ],
                ];
            }
            case 'PUT':
            {
                return [
                    'cat_nombre' => [
                        'required', 'min:3','max:60',Rule::unique('categorias')->ignore($this->id_validate),
                    ],
                ];
            }
            default:break;
        }
    }
    public function attributes()
    {
        return [
            'cat_nombre' => 'nombre',
        ];
    }
}