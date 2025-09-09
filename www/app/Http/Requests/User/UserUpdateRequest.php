<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class UserUpdateRequest extends BaseRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->input('data.id');
        return [
            'data.id' => ['required', 'integer', Rule::exists('users', 'id'),],
            'data.name' => 'required|string|min:5|max:255',
            'data.email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id),],
            'data.password' => ['required', 'string', 'min:6', 'max:80'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'data.id.exists' => 'The given ID does not exist.',
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 5 characters long',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters long',
        ];
    }
}
