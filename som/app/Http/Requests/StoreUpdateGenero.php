<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateGenero extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'name' => 'required|string|max:100|min:2'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Campo obrigatório!',
            'name.max' => 'Você  ultrapassou a quantidade máxima de caracteres permitida (100)',
            'name.min' => 'Você não atingiu a quantidade minima de caracteres (2)',
        ];
    }
}
