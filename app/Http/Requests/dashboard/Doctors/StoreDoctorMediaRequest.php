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
            'videos.*.video_url'   => 'required_with:videos|string|max:191',
            'videos.*.title_en'    => 'required_with:videos|string|max:191',
            'videos.*.title_ar'    => 'required_with:videos|string|max:191',
            'videos.*.status'      => 'required_with:videos|in:0,1',

            ];
    }

    public function messages(): array
    {
        return [





            ];
    }

}
