<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAlbumFormRequest extends FormRequest
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
            'file'     => ['nullable', 'image', 'max:30000'],
            'name'     => 'required|string|max:100|min:1',
            'artist'   => 'required|string|max:100|min:1',
            'gender'   => 'required|string',
            'price'    => 'required|numeric'

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
            'file.max'        => 'Tamanho máximo permitido por imagem "30mb"',
            'file.image'      => 'Apenas arquivos do tipo "imagem" são permitidos!',
            'name.required'   => 'O campo "Nome" é obrigatório!',
            'name.max'        => 'Você ultrapassou a quantidade máxima permitida de caracteres para o campo "Nome"',
            'name.min'        => 'Tamanho mínimo permitido para o campo "Nome" é 1 caractere!',
            'artist.required' => 'O campo "Artista" é obrigatório!',
            'artist.max'      => 'Você ultrapassou a quantidade máxima permitida de caracteres para o campo "Artista"',
            'artist.min'      => 'Tamanho mínimo permitido para o campo "Artista" é 1 caractere!',
            'gender.required' => 'O campo "Gênero" é obrigatório!',
            'price.required'  => 'O campo "Preço" é obrigatório!',
            'price.numeric'   => 'O campo "Preço" precisa ser numérico!'

        ];
    }
}
