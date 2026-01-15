<?php

namespace App\Http\Requests\dashboard\Doctors;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDoctorMediaRequest extends FormRequest
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

            'videos'               => 'required|array',
            'videos.*.video_url'   => 'required_with:videos|string|min:8',
            'videos.*.title_en'    => 'required_with:videos|string|min:8',
            'videos.*.title_ar'    => 'required_with:videos|string|min:8',
            'videos.*.status'      => 'required_with:videos|in:0,1',

            ];
    }

    public function messages(): array
    {
        return [

            'videos.required' => 'The videos field is required.',
            'videos.array'    => 'The videos must be an array.',
            'videos.*.video_url.required_with' => 'The video URL is required when videos are provided.',
            'videos.*.video_url.string' => 'The video URL must be a valid string.',
            'videos.*.video_url.max' => 'The video URL may not be greater than 191 characters.',
            'videos.*.title_en.required_with' => 'The English title is required when videos are provided.',
            'videos.*.title_en.string' => 'The English title must be a valid string.',
            'videos.*.title_en.max' => 'The English title may not be greater than 191 characters.',
            'videos.*.title_ar.required_with' => 'The Arabic title is required when videos are provided.',
            'videos.*.title_ar.string' => 'The Arabic title must be a valid string.',
            'videos.*.title_ar.max' => 'The Arabic title may not be greater than 191 characters.',
            'videos.*.status.required_with' => 'The video status is required when videos are provided.',
            'videos.*.status.in' => 'The video status must be either inactive or active.',

            ];
    }

}
