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
                [ 'required', 'string',  Rule::unique('services' , 'name_en')->ignore($id)],
            'name_ar' =>
                [ 'required', 'string',  Rule::unique('services' , 'name_ar')->ignore($id)],
            'description_ar'  => 'required|string',
            'description_en'  => 'required|string',
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
            'brief_en'  => 'required|string',
            'brief_ar'  => 'required|string',


            /*** FAQs ***/
            'faqs'                 => 'required|array',
            'faqs.*.question_en'      => 'required_with:faqs|string',
            'faqs.*.question_ar'      => 'required_with:faqs|string',
            'faqs.*.answer_en'        => 'required_with:faqs|string',
            'faqs.*.answer_ar'        => 'required_with:faqs|string',

            /*** Symptoms ***/
            'symptoms'     => 'required|array',
            'symptoms.*.title_en'      => 'required_with:symptoms|string',
            'symptoms.*.title_ar'      => 'required_with:symptoms|string',
            'symptoms.*.description_en'        => 'required_with:symptoms|string',
            'symptoms.*.description_ar'        => 'required_with:symptoms|string',

            /*** Techniques ***/
            'techniques'   => 'required|array',
            'techniques.*.title_en'      => 'required_with:techniques|string',
            'techniques.*.title_ar'      => 'required_with:techniques|string',
            'techniques.*.description_en'        => 'required_with:techniques|string',
            'techniques.*.description_ar'        => 'required_with:techniques|string',
            'techniques.*.suitable_for_en'        => 'required_with:techniques|string',
            'techniques.*.suitable_for_ar'        => 'required_with:techniques|string',
        ];
    }

    public function messages(): array
    {
        return [

            /*** Service ***/
            'service_id.exists' => 'The selected service does not exist.',

            'name_en.required' => 'Service name (English) is required.',
            'name_en.string'    => 'Service name (English) must be Text.',
            'name_en.unique'   => 'This English service name already exists.',

            'name_ar.required' => 'Service name (Arabic) is required.',
            'name_ar.string'    => 'Service name (Arabic)  must be Text.',
            'name_ar.unique'   => 'This Arabic service name already exists.',

            'description_en.required' => 'English description is required.',
            'description_en.string'    => 'English description must be Text.',

            'description_ar.required' => 'Arabic description is required.',
            'description_ar.string'    => 'Arabic description  must be Text.',

            'brief_en.required' => 'English brief is required.',
            'brief_en.string'    => 'English brief must be Text.',

            'brief_ar.required' => 'Arabic brief is required.',
            'brief_ar.string'    => 'Arabic brief  must be Text.',

            /*** Image & Icon ***/
            'image.required' => 'Service image is required.',
            'image.image'    => 'Service image must be a valid image file.',
            'image.mimes'    => 'Service image must be jpg, jpeg, png, or webp.',
            'image.max'      => 'Service image size must not exceed 2MB.',

            'icon.required' => 'Service icon is required.',
            'icon.image'    => 'Service icon must be a valid image file.',
            'icon.mimes'    => 'Service icon must be jpg, jpeg, png, or webp.',
            'icon.max'      => 'Service icon size must not exceed 2MB.',

            /*** FAQs ***/
            'faqs.required' => 'FAQs are required.',
            'faqs.array'    => 'FAQs must be an array.',

            'faqs.*.question_en.required_with' => 'FAQ question (English) is required.',
            'faqs.*.question_en.string'         => 'FAQ question (English) must be Text.',

            'faqs.*.question_ar.required_with' => 'FAQ question (Arabic) is required.',
            'faqs.*.question_ar.string'         => 'FAQ question (Arabic)  must be Text.',

            'faqs.*.answer_en.required_with' => 'FAQ answer (English) is required.',
            'faqs.*.answer_en.string'         => 'FAQ answer (English) must be Text.',

            'faqs.*.answer_ar.required_with' => 'FAQ answer (Arabic) is required.',
            'faqs.*.answer_ar.string'         => 'FAQ answer (Arabic)  must be Text.',

            /*** Symptoms ***/
            'symptoms.required' => 'Symptoms are required.',
            'symptoms.array'    => 'Symptoms must be an array.',

            'symptoms.*.title_en.required_with' => 'Symptom title (English) is required.',
            'symptoms.*.title_en.string'         => 'Symptom title (English) must be Text.',

            'symptoms.*.title_ar.required_with' => 'Symptom title (Arabic) is required.',
            'symptoms.*.title_ar.string'         => 'Symptom title (Arabic)  must be Text.',

            'symptoms.*.description_en.required_with' => 'Symptom description (English) is required.',
            'symptoms.*.description_en.string'         => 'Symptom description (English) must be Text.',

            'symptoms.*.description_ar.required_with' => 'Symptom description (Arabic) is required.',
            'symptoms.*.description_ar.string'         => 'Symptom description (Arabic)  must be Text.',

            /*** Techniques ***/
            'techniques.required' => 'Techniques are required.',
            'techniques.array'    => 'Techniques must be an array.',

            'techniques.*.title_en.required_with' => 'Technique title (English) is required.',
            'techniques.*.title_en.string'         => 'Technique title (English) must be Text.',

            'techniques.*.title_ar.required_with' => 'Technique title (Arabic) is required.',
            'techniques.*.title_ar.string'         => 'Technique title (Arabic)  must be Text.',

            'techniques.*.description_en.required_with' => 'Technique description (English) is required.',
            'techniques.*.description_en.string'         => 'Technique description (English) must be Text.',

            'techniques.*.description_ar.required_with' => 'Technique description (Arabic) is required.',
            'techniques.*.description_ar.string'         => 'Technique description (Arabic)  must be Text.',

            'techniques.*.suitable_for_en.required_with' => 'Suitable for (English) is required.',
            'techniques.*.suitable_for_en.string'         => 'Suitable for (English) must be Text.',

            'techniques.*.suitable_for_ar.required_with' => 'Suitable for (Arabic) is required.',
            'techniques.*.suitable_for_ar.string'         => 'Suitable for (Arabic)  must be Text.',
        ];
    }

}
