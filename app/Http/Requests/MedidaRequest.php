<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MedidaRequest extends FormRequest
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
                    'med_nombre' => [
                        'required','unique:medidas'
                    ],
                    'med_abreviatura' => [
                        'required','unique:medidas'
                    ],
                ];
            }
            case 'PUT':
            {
                return [
                    'med_nombre' => [
                        'required',Rule::unique('medidas')->ignore($this->id_validate),
                    ],
                    'med_abreviatura' => [
                        'required',Rule::unique('medidas')->ignore($this->id_validate),
                    ],
                ];
            }
            default:break;
        }
    }
    public function attributes()
    {
        return [
            'med_nombre' => 'nombre',
            'med_abreviatura' => 'abreviatura',
        ];
    }
}
