<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * @author João Vitor Boltelho <developer.joaovitor@gmail.com>
 */
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
            'data.name' => 'required|string|min:5|max:255',
            'data.email' => 'required|email|unique:users,email',
            'data.password' => ['required', 'string', 'min:6', 'max:80'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 5 characters long',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'This email address already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters long',
        ];
    }
}
