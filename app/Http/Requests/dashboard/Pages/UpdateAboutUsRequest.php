<?php

namespace App\Http\Requests\dashboard\Pages;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutUsRequest extends FormRequest
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

            // Mission
            'mission_en' => 'required|string',
            'mission_ar' => 'required|string',

            // Vision
            'vision_en' => 'required|string',
            'vision_ar' => 'required|string',

            // Story
            'our_story_en' => 'required|string',
            'our_story_ar' => 'required|string',

            // Numbers / Counters
            'recovery_count' => 'required|string',
            'doctors_count' => 'required|string',
            'experience_years' => 'required|string',

            // Value 1
            'value1_title_en' => 'required|string',
            'value1_title_ar' => 'required|string',
            'value1_desc_en'  => 'required|string',
            'value1_desc_ar'  => 'required|string',

            // Value 2
            'value2_title_en' => 'required|string',
            'value2_title_ar' => 'required|string',
            'value2_desc_en'  => 'required|string',
            'value2_desc_ar'  => 'required|string',

            // Value 3
            'value3_title_en' => 'required|string',
            'value3_title_ar' => 'required|string',
            'value3_desc_en'  => 'required|string',
            'value3_desc_ar'  => 'required|string',

            // Value 4
            'value4_title_en' => 'required|string',
            'value4_title_ar' => 'required|string',
            'value4_desc_en'  => 'required|string',
            'value4_desc_ar'  => 'required|string',

            // Value 5
            'value5_title_en' => 'required|string',
            'value5_title_ar' => 'required|string',
            'value5_desc_en'  => 'required|string',
            'value5_desc_ar'  => 'required|string',
        ];
    }

    /**
     * Custom error messages (Optional)
     */
    public function messages(): array
    {
        return [
            'required' => 'This :attribute is required.',
            'string' => 'The :attribute must be text.',

        ];
    }
}
