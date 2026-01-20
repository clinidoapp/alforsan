<?php

namespace App\Http\Requests\dashboard\Doctors;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorMediaRequest extends FormRequest
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
        return array(
            'video_id' => 'required|exists:doctor_videos,id',
            'video_url'   => 'required|string|min:8',
            'title_en'    => 'required|string|min:8',
            'title_ar'    => 'required|string|min:8',
            'status'      => 'required|in:0,1',

        );
    }
}
