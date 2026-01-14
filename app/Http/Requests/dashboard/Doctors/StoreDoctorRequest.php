<?php

namespace App\Http\Requests\dashboard\Doctors;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'email' => ['required', 'email', 'unique:doctors,email'],
            'phone' => 'required|string|max:20',
            'academic_title'    => 'required|string|in:specialist,professor,consultant',
            'services_ids'         => 'required|array',
            'services_ids.*'       => 'required|exists:services,id',
            'main_speciality_en'   => 'required|string|max:191',
            'main_speciality_ar'   => 'required|string|max:191',
            'bio_en'               => 'required|string',
            'bio_ar'               => 'required|string',
            'image'                => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'experiences_en' => ['required', 'array'],
            'experiences_ar' => ['required', 'array'],
            'qualifications_en' => ['required', 'array'],
            'qualifications_ar' => ['required', 'array'],
            
            /*  //'academic_title_ar'    => 'required|string|max:191',


              /*
              'experiences.*.experiences_en' => ['required_with:experiences', 'string'],
              'experiences.*.experiences_ar' => ['required_with:experiences', 'string'],
              /*
              'experiences_en'       => 'required|string',
              'experiences_ar'       => 'required|string',


            'qualifications.*.qualifications_en' => ['required_with:qualifications', 'string'],
            'qualifications.*.qualifications_ar' => ['required_with:qualifications', 'string'],

            'qualifications_en'    => 'required|string',
            'qualifications_ar'    => 'required|string',

            //'status'               => 'required|in:0,1',


            'videos'               => 'required|array',
            'videos.*.video_url'   => 'required_with:videos|string|max:191',
            'videos.*.title_en'    => 'required_with:videos|string|max:191',
            'videos.*.title_ar'    => 'required_with:videos|string|max:191',
            'videos.*.status'      => 'required_with:videos|in:0,1',
           */

            ];
    }

    public function messages(): array
    {
        return [

            // required
            'name_en.required'            => 'The :name_en field is required.',
            'name_ar.required'            => 'The :name_ar field is required.',


            'academic_title_en.required'  => 'The :academic_title_en field is required.',
            'academic_title_ar.required'  => 'The :academic_title_ar field is required.',
            'main_speciality_en.required' => 'The :main_speciality_en field is required.',
            'main_speciality_ar.required' => 'The :main_speciality_ar field is required.',

            'bio_en.required'             => 'The :bio_en field is required.',
            'bio_ar.required'             => 'The :bio_ar field is required.',
            'experiences_en.required'     => 'The :experiences_en field is required.',
            'experiences_ar.required'     => 'The :experiences_ar field is required.',
            'qualifications_en.required'  => 'The :qualifications_en field is required.',
            'qualifications_ar.required'  => 'The :qualifications_ar field is required.',

            'image.required'              => 'The :image field is required.',
           // 'status.required'             => 'The :attribute field is required.',

            // string
            'name_en.string'              => 'The :name_en must be a valid string.',
            'name_ar.string'              => 'The :name_ar must be a valid string.',

            'academic_title_en.string'    => 'The :academic_title_en must be a valid string.',
            'academic_title_ar.string'    => 'The :academic_title_ar must be a valid string.',
            'main_speciality_en.string'   => 'The :main_speciality_en must be a valid string.',
            'main_speciality_ar.string'   => 'The :main_speciality_ar must be a valid string.',

            'bio_en.string'               => 'The :bio_en must be a valid string.',
            'bio_ar.string'               => 'The :bio_ar must be a valid string.',
            'experiences_en.string'       => 'The :experiences_en must be a valid string.',
            'experiences_ar.string'       => 'The :experiences_ar must be a valid string.',
            'qualifications_en.string'    => 'The :qualifications_en must be a valid string.',
            'qualifications_ar.string'    => 'The :qualifications_ar must be a valid string.',

            // image
            'image.image'                 => 'The :image must be an image.',
            'image.mimes'                 => 'The :image must be a file of type: :values.',
            'image.max'                   => 'The :image may not be greater than :max kilobytes.',

            // in
           // 'status.in'                   => __('validation.doctor.in'),

            'services_ids.required'   => 'The :services_ids field is required.',
            //'services_ids.array'      => __('validation.array'),

            // services_ids.*
            'services_ids.*.required' => 'The :services_ids field is required.',
            'services_ids.*.exists'   => 'The services_ids  is invalid.',

            ];
    }

}
