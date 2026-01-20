<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class DoctorsPageController extends Controller
{

    public function listDoctors(Request $request){

        $query= DB::table('doctors')
            ->where('status', 1)
            ->where('is_deleted', 0)
            ->select('id','name_en' , 'name_ar' , 'image' ,'academic_title_ar','academic_title_en',
                'main_speciality_en' , 'main_speciality_ar');


        if ($request->filled('doctor_name')) {
            $search = trim($request->doctor_name);

            $search = str_replace(['أ','إ','آ'], 'ا', $search);
            $search = str_replace(['ى','ي'], 'ي', $search);
            $search = str_replace('ة', 'ه', $search);
            $query->where( function ($q) use ($search) {
                $q->where('name_en', 'like', '%' . $search . '%')
                    ->orWhereRaw("
        REPLACE(
          REPLACE(
            REPLACE(
              REPLACE(
                REPLACE(name_ar,'أ','ا'),
              'إ','ا'),
            'آ','ا'),
          'ى','ي'),
        'ة','ه')
        LIKE ?
      ", ["%{$search}%"]);
            });
        }
        $doctors =    $query->paginate(10);
        return view('website.pages.doctors', compact('doctors'));

    }

    public function doctorDetails($id){

        $doctor = DB::table('doctors')
            ->where('status', 1)
            ->where('id', $id)
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
                'speciality_ar', 'speciality_en',
            )->first();
        $videos = DB::table('doctor_videos')
            ->where('doctor_id', $id)
            ->where('status', 1)
            ->where('is_deleted', 0)
            ->whereNull('deleted_at')
            ->select('video_url' , 'title_ar' , 'title_en')
            ->get()->toArray();

        $doctor->experiences_en = explode(',', $doctor->experiences_en);
        $doctor->experiences_ar = explode(',', $doctor->experiences_ar);
        $doctor->qualifications_en = explode(',', $doctor->qualifications_en);
        $doctor->qualifications_ar = explode(',', $doctor->qualifications_ar);
        $doctor->videos = $videos;
        return view('website.pages.doctor-details', compact('doctor'));
    }


}
