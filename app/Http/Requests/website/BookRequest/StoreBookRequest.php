<?php

namespace App\Http\Requests\website\BookRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'full_name'       => 'required|string|min:3|max:255',
            'phone'      => 'required|string|max:20',
            'email'      => 'nullable|email|max:255',
            'service_id' => 'required|exists:services,id',
            'notes'      => 'nullable',
        ];
    }
    public function messages(): array{

        return [
            'full_name.required'  => __('validation.contact.full_name.required'),
            'full_name.min'       => __('validation.contact.full_name.min'),

            'phone.required'      => __('validation.contact.phone.required'),
            'phone.regex'         => __('validation.contact.phone.regex'),

            'email.email'         => __('validation.contact.email.email'),

            'service_id.required' => __('validation.contact.service.required'),
            'service_id.exists'   => __('validation.contact.service.exists'),
        ];
    }
}
