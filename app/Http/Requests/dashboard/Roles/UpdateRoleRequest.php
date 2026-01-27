<?php

namespace App\Http\Requests\dashboard\Roles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
        return [
            '*'   => ['array'],
            '*.*' => ['integer', 'exists:permissions,id'],
        ];
    }

    public function messages(): array
    {
        return [

            '*.array' => 'Permissions must be sent as arrays.',
            '*.*.integer' => 'Permission ID must be an integer.',
            '*.*.exists' => 'Invalid permission selected.',

        ];
    }
}
