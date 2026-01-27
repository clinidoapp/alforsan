<?php

namespace App\Http\Requests\dashboard\Roles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoleRequest extends FormRequest
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
        $id = $this->route('id');

        return [
            '*'   => ['array'],
            '*.*' => ['integer', 'exists:permissions,id'],
           /*
            'name' => [
                'required',
                'string',
                Rule::unique('roles', 'name')->ignore($id),
            ],
            'permissions_ids' => 'required|array|min:1',
            'permissions_ids.*' => 'exists:permissions,id',
           */
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
