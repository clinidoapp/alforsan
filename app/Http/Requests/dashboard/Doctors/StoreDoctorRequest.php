<?php

namespace App\Http\Requests\dashboard\Doctors;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'name_en'              => 'required|string|max:191',
            'name_ar'              => 'required|string|max:191',
            'academic_title_en'    => 'required|string|max:191',
            'academic_title_ar'    => 'required|string|max:191',
            'main_speciality_en'   => 'required|string|max:191',
            'main_speciality_ar'   => 'required|string|max:191',

            'bio_en'               => 'required|string',
            'bio_ar'               => 'required|string',
            'experiences_en'       => 'required|string',
            'experiences_ar'       => 'required|string',
            'qualifications_en'    => 'required|string',
            'qualifications_ar'    => 'required|string',

            'image'                => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'               => 'required|in:0,1',

            'services_ids'         => 'required|array',
            'services_ids.*'       => 'required|exists:services,id',

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

            // required
            'name_en.required'            => __('validation.doctor.required'),
            'name_ar.required'            => __('validation.doctor.required'),
            'academic_title_en.required'  => __('validation.doctor.required'),
            'academic_title_ar.required'  => __('validation.doctor.required'),
            'main_speciality_en.required' => __('validation.doctor.required'),
            'main_speciality_ar.required' => __('validation.doctor.required'),

            'bio_en.required'             => __('validation.doctor.required'),
            'bio_ar.required'             => __('validation.doctor.required'),
            'experiences_en.required'     => __('validation.doctor.required'),
            'experiences_ar.required'     => __('validation.doctor.required'),
            'qualifications_en.required'  => __('validation.doctor.required'),
            'qualifications_ar.required'  => __('validation.doctor.required'),

            'image.required'              => __('validation.doctor.required'),
            'status.required'             => __('validation.doctor.required'),

            // string
            'name_en.string'              => __('validation.doctor.string'),
            'name_ar.string'              => __('validation.doctor.string'),
            'academic_title_en.string'    => __('validation.doctor.string'),
            'academic_title_ar.string'    => __('validation.doctor.string'),
            'main_speciality_en.string'   => __('validation.doctor.string'),
            'main_speciality_ar.string'   => __('validation.doctor.string'),

            'bio_en.string'               => __('validation.doctor.string'),
            'bio_ar.string'               => __('validation.doctor.string'),
            'experiences_en.string'       => __('validation.doctor.string'),
            'experiences_ar.string'       => __('validation.doctor.string'),
            'qualifications_en.string'    => __('validation.doctor.string'),
            'qualifications_ar.string'    => __('validation.doctor.string'),

            // image
            'image.image'                 => __('validation.doctor.image'),
            'image.mimes'                 => __('validation.doctor.mimes'),
            'image.max'                   => __('validation.doctor.max.file'),

            // in
            'status.in'                   => __('validation.doctor.in'),

            'services_ids.required'   => __('validation.required'),
            'services_ids.array'      => __('validation.array'),

            // services_ids.*
            'services_ids.*.required' => __('validation.required'),
            'services_ids.*.exists'   => __('validation.exists'),

            ];
    }

}
