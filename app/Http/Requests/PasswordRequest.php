<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'user_password_old' => 'required|min:7',
            'user_password_new' => 'required|min:7',
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
            'user_password_old.required'    => 'Senha antiga é obrigatório.',
            'user_password_old.min'         => 'Tamanho mínimo de :min',
            'user_password_new.required'    => 'Nova senha é obrigatório.',
            'user_password_new.min'         => 'Tamanho mínimo de :min'
        ];
    }
}
