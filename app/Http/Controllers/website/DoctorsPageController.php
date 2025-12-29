<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class DoctorsPageController extends Controller
{

    public function listDoctors(){

        $doctors= DB::table('doctors')
            ->where('status', 1)
            ->where('is_deleted', 0)
            ->select('id','name_en' , 'name_ar' , 'image' , 'main_speciality_en' , 'main_speciality_ar')
            ->paginate(12);

        return view('website.pages.doctors', compact('doctors'));

    }

    public function doctorDetails($id){

        $doctor = DB::table('doctors')
            ->where('status', 1)
            ->where('is_deleted', 0)
            ->select(
                'id',
                'name_en', 'name_ar',
                'image', 'status' ,
                'main_speciality_en', 'main_speciality_ar',
                'academic_title_en', 'academic_title_ar',
                'bio_en', 'bio_ar',
                'experiences_en' , 'experiences_ar',
                'qualifications_en' , 'qualifications_ar',

            )->first();
        $videos = DB::table('doctor_videos')
            ->where('doctor_id', $id)
            ->where('status', 1)
            ->select('video_url')
            ->get()->toArray();

        $doctor->experiences_en = explode(',', $doctor->experiences_en);
        $doctor->experiences_ar = explode(',', $doctor->experiences_ar);
        $doctor->qualifications_en = explode(',', $doctor->qualifications_en);
        $doctor->qualifications_ar = explode(',', $doctor->qualifications_ar);
        $doctor->videos = $videos;
        return view('*********', compact('doctor'));
    }


}
