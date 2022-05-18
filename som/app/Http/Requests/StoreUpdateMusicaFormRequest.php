<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMusicaFormRequest extends FormRequest
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
            'name' => 'required|string|max:100|min:2',
            'durable' => 'required|string|max:100|min:1',
            'id' => 'required|min:1|numeric'
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
            'name.required' => 'O Campo "Nome" é obrigatório!',
            'name.max' => 'Você  ultrapassou a quantidade máxima de caracteres permitida (100) no campo "Nome"',
            'name.min' => 'Você não atingiu a quantidade minima de caracteres (2) no campo "Nome"',
            'durable.required' => 'O Campo "Duração" é obrigatório!',
            'durable.max' => 'Você  ultrapassou a quantidade máxima de caracteres permitida (30) no campo "Duração"',
            'durable.min' => 'Você não atingiu a quantidade minima de caracteres (1) no campo "Duração"',
            'id.required' => 'Essa área só pode ser acessada a partir de algum álbum!',
            'id.min' => 'Erro, volte para dashboard e tente novamente!',
            'id.numeric' => 'Erro, volte para dashboard e tente novamente!',
        ];
    }
}
