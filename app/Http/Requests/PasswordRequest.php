<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
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
            'user_password_old' => ['required', new MatchOldPassword],
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
            'user_password_old.required'    => 'Por favor informe a senha utilizada atualmente.',
            'user_password_old.min'         => 'O tamanho mínimo exigido para a senha é de :min caracteres.',
            'user_password_new.required'    => 'Por favor informe um nova senha.',
            'user_password_new.min'         => 'O tamanho mínimo exigido para a senha é de :min caracteres.'
        ];
    }
}
