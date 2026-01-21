<?php

namespace App\Http\Requests\dashboard\Services;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrEditServiceRequest extends FormRequest
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

        //                Rule::unique('roles', 'name')->ignore($id),
        return [
            /*** Service ***/
            'service_id'   => 'nullable|exists:services,id',
            'name_en' =>
                [ 'required', 'string', 'regex:/^[A-Za-z\s]+$/',  Rule::unique('services' , 'name_en')->ignore($id)],
            'name_ar' =>
                [ 'required', 'string', 'regex:/^[\p{Arabic}\s]+$/u',  Rule::unique('services' , 'name_ar')->ignore($id)],
            'description_en'  => 'required|string|regex:/^[A-Za-z\s]+$/',
            'description_ar'  => 'required|string|regex:/^[\p{Arabic}\s]+$/u',
            'image' => [
                $id ? 'nullable' : 'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'icon' => [
                $id ? 'nullable' : 'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
            'brief_en'  => 'required|string|regex:/^[A-Za-z\s]+$/',
            'brief_ar'  => 'required|string|regex:/^[\p{Arabic}\s]+$/u',


            /*** FAQs ***/
            'faqs'                 => 'required|array',
            'faqs.*.question_en'      => 'required_with:faqs|string|regex:/^[A-Za-z\s]+$/',
            'faqs.*.question_ar'      => 'required_with:faqs|string|regex:/^[\p{Arabic}\s]+$/u',
            'faqs.*.answer_en'        => 'required_with:faqs|string|regex:/^[A-Za-z\s]+$/',
            'faqs.*.answer_ar'        => 'required_with:faqs|string|regex:/^[\p{Arabic}\s]+$/u',

            /*** Symptoms ***/
            'symptoms'     => 'required|array',
            'symptoms.*.title_en'      => 'required_with:symptoms|string|regex:/^[A-Za-z\s]+$/',
            'symptoms.*.title_ar'      => 'required_with:symptoms|string|regex:/^[\p{Arabic}\s]+$/u',
            'symptoms.*.description_en'        => 'required_with:symptoms|string|regex:/^[A-Za-z\s]+$/',
            'symptoms.*.description_ar'        => 'required_with:symptoms|string|regex:/^[\p{Arabic}\s]+$/u',

            /*** Techniques ***/
            'techniques'   => 'required|array',
            'techniques.*.title_en'      => 'required_with:techniques|string|regex:/^[A-Za-z\s]+$/',
            'techniques.*.title_ar'      => 'required_with:techniques|string|regex:/^[\p{Arabic}\s]+$/u',
            'techniques.*.description_en'        => 'required_with:techniques|string|regex:/^[A-Za-z\s]+$/',
            'techniques.*.description_ar'        => 'required_with:techniques|string|regex:/^[\p{Arabic}\s]+$/u',
            'techniques.*.suitable_for_en'        => 'required_with:techniques|string|regex:/^[A-Za-z\s]+$/',
            'techniques.*.suitable_for_ar'        => 'required_with:techniques|string|regex:/^[\p{Arabic}\s]+$/u',
        ];
    }
}
