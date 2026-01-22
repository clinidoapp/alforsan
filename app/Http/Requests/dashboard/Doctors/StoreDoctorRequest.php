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

        $id = $this->route('id');
        return [
            'name_en'              => 'required|string|max:191',
            'name_ar'              => 'required|string|max:191',
            'email' => ['required', 'email',
                Rule::unique('doctors', 'email')->ignore($id ,'id')
        //'unique:doctors,email'
        ],
            'phone' =>
                ['required', 'string', 'max:20' ,
                    Rule::unique('doctors', 'phone')->ignore($id ,'id')
                    //'unique:doctors,email'
                ],
               // 'required|string|max:20|unique:doctors,phone',
            'academic_title'    => 'required|string|in:specialist,professor,consultant,lecturer,fellowship,assistantLecturer,assistantProfessor',
            'services_ids'         => 'required|array',
            'services_ids.*'       => 'exists:services,id',
            'main_speciality_en'   => 'required|string|max:191',
            'main_speciality_ar'   => 'required|string|max:191',
            'speciality_en'   => 'required|string|max:191',
            'speciality_ar'   => 'required|string|max:191',
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
            'name_en.required'            => 'The English Name field is required.',
            'name_ar.required'            => 'The Arabic Name field is required.',


            'academic_title.required'  => 'The Academic Title field is required.',
            'main_speciality_en.required' => 'The English Main Speciality field is required.',
            'main_speciality_ar.required' => 'The Arabic Main Speciality field is required.',

            'bio_en.required'             => 'The English Bio field is required.',
            'bio_ar.required'             => 'The Arabic Bio field is required.',
            'experiences_en.required'     => 'The English Experiences field is required.',
            'experiences_ar.required'     => 'The Arabic Experiences field is required.',
            'qualifications_en.required'  => 'The English Qualifications field is required.',
            'qualifications_ar.required'  => 'The Arabic Qualifications field is required.',

            'image.required'              => 'The Image field is required.',
           // 'status.required'             => 'The :attribute field is required.',

            // string
            'name_en.string'              => 'The English Name must be a valid string.',
            'name_ar.string'              => 'The Arabic Name must be a valid string.',

            'academic_title_en.string'    => 'The English Academic Title must be a valid string.',
            'academic_title_ar.string'    => 'The Arabic Academic Title must be a valid string.',
            'main_speciality_en.string'   => 'The English Main Speciality must be a valid string.',
            'main_speciality_ar.string'   => 'The Arabic Main Speciality must be a valid string.',
            'speciality_en.string'   => 'The English Speciality must be a valid string.',
            'speciality_ar.string'   => 'The Arabic Speciality must be a valid string.',

            'bio_en.string'               => 'The English Bio must be a valid string.',
            'bio_ar.string'               => 'The Arabic Bio must be a valid string.',
            'experiences_en.string'       => 'The English Experiences must be a valid string.',
            'experiences_ar.string'       => 'The Arabic Experiences must be a valid string.',
            'qualifications_en.string'    => 'The English Qualifications must be a valid string.',
            'qualifications_ar.string'    => 'The Arabic Qualifications must be a valid string.',

            // image
            'image.image'                 => 'The Attachment must be an image.',
            'image.mimes'                 => 'The Image must be a type of jpg,jpeg,png,webp.',
            'image.max'                   => 'The Image may not be greater than :max kilobytes.',

            // in
           // 'status.in'                   => __('validation.doctor.in'),

            'services_ids.required'   => 'The Services field is required.',
            //'services_ids.array'      => __('validation.array'),

            // services_ids.*
           // 'services_ids.*.required' => 'The :services_ids field is required.',
          //  'services_ids.*.exists'   => 'The services_ids  is invalid.',

            ];
    }

}
