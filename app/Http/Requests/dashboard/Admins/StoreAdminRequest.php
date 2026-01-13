<?php

namespace App\Http\Requests\dashboard\Admins;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminRequest extends FormRequest
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
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'password' => $id ? 'nullable|min:8' : 'required|min:8',
            'role_id' => 'required|exists:roles,id',

        ];
    }
    public function messages(): array{

        return [

            'name.required' => 'The Name field is required.',
            'email.required' =>  'The Email field is required.',
            'email.unique' => 'The Email has already been taken.',
            'password.required' => 'The Password field is required.',
            'password.min' => 'The Password must be at least 8 characters.',
            'role_id.required' => 'The Role field is required.',
            'role_id.exists' => 'Selected Role is invalid.',

        ];
    }
}
