<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UserRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:6', 'max:80'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
        'name.required' => 'O nome é obrigatório',
        'name.min' => 'O nome deve ter no mínimo 5 caracteres',
        'email.required' => 'O email é obrigatório',
        'email.email' => 'O email deve ser válido',
        'email.unique' => 'Esse email já está cadastrado',
        'password.required' => 'A senha é obrigatória',
        'password.min' => 'A senha deve ter no mínimo 6 caracteres',
    ];
    }
}
