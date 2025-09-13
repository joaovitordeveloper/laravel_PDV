<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserDeleteRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data.id' => ['required', 'integer', Rule::exists('users', 'id'),]
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'data.id.exists' => 'The given ID does not exist.'
        ];
    }
}
