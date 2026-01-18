<?php

namespace App\Http\Requests\dashboard\Roles;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => 'required|string|unique:roles,name',
            'permissions_ids' => 'required|array|min:1',
            'permissions_ids.*' => 'exists:permissions,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Role name is required.',
            'name.unique' => 'This role name already exists.',
            'permissions_ids.required' => 'At least one permission must be selected.',
            'permissions_ids.array' => 'Permissions must be an array.',
            'permissions_ids.*.exists' => 'Invalid permission selected.',
        ];
    }
}
