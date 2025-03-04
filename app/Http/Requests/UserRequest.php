<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Determina si la solicitud es para login o registro.
     */
    private function isRegisterOrLogin(): bool
    {
        $routeName = $this->route()->getName();
        return in_array($routeName, ['login', 'register']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isEditing = $this->route()->getName() === 'users.edit' || $this->route()->getName() === 'users.update';

        return [
            'name' => 'required|string|max:20',
            'surname' => 'required|string|max:50',
            'username' => [
                'required',
                'string',
                Rule::unique('users', 'username')->ignore($this->route('user')),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->route('user')),
            ],
            'dni' => [
                'required',
                'string',
                'regex:/^\d{8}[A-HJ-NP-TV-Z]$/',
                Rule::unique('users', 'dni')->ignore($this->route('user')),
            ],
            'password' => $isEditing ? 'nullable|string' : 'required|string',
            'role' => 'required|string',
        ];
    }
}
