<?php

namespace App\Http\Controllers\dashboard;

use App\Enums\AcademicTitle;
use App\Enums\ImagePaths;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\ImageHandlerService;
use App\Http\Requests\dashboard\Doctors\StoreDoctorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function listDoctors(Request $request){

        $query= DB::table('doctors')
            ->where('status', 1)
            ->where('is_deleted', 0)
            ->select('id','name_en' , 'name_ar' , 'email' ,'phone','status');

        if ($request->filled('doctor_id')) {
            $query->where('id', $request->doctor_id);
        }

        if ($request->filled('doctor_phone')) {
            $query->where('phone', $request->doctor_phone);
        }

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
        return view('********', compact('doctors'));

    }
    public function addDoctor(Request $request){

        $service = DB::table('services')
            ->where('status', 1)
            ->select('id','name_en as name' )
            ->get();

        return view('********');
    }
    public function storeDoctor(StoreDoctorRequest $request){

        $data = $request->validated();

        DB::transaction(function () use ($data, $request) {

            $image_name = null ;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = ImageHandlerService::fileUploader(ImagePaths::DOCTOR_PHOTOS->value,$image,null);
            }
            $academicTitle =  $data['academic_title'] ;
            $obj = AcademicTitle::from($academicTitle);
            $doctor_id = DB::table('doctors')->insertGetId([
                'name_en' => $data['name_en'],
                'name_ar' => $data['name_ar'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'academic_title_ar' => $obj->label('ar'),
                'academic_title_en' =>  $obj->label('en'),
                'main_speciality_ar' => $data['main_speciality_ar'],
                'main_speciality_en' => $data['main_speciality_en'],
                'bio_ar' => $data['bio_ar'],
                'bio_en' => $data['bio_en'],
                'experiences_ar' => implode(' , ', $data['experiences_ar']),
                'experiences_en' => implode(' , ', $data['experiences_en']),
                'qualifications_ar' => implode(' , ',  $data['qualifications_ar']),
                'qualifications_en' => implode(' , ', $data['qualifications_en']),
                'image' => $image_name,
                'status' => 1,
            ]);

            foreach ($data['services_ids'] as $serviceId) {
                DB::table('doctor_service')->updateOrInsert(
                    [
                        'doctor_id'  => $doctor_id,
                        'service_id' => $serviceId,
                    ],
                    [
                        'created_at' => now(),
                    ]
                );

            }

            /*
            foreach ($data['videos'] as $video) {
                dd($video);
                DB::table('doctor_videos')->updateOrInsert(
                    [
                        'doctor_id'  => $doctor_id,
                        'video_url' => $serviceId,
                    ],
                    [
                        'title_en'  => $video['title_en'],
                        'title_ar'  => $video['title_ar'],
                        'status'    => 1,
                        'created_at'=> now(),
                        'updated_at'=> now(),
                        ]
                );

            }
            */

        });

        return view('********');
    }
    public function viewDoctor(Request $request,$id)
    {
        $doctor = DB::table('doctors')
            ->where('doctors.id', $id)
            ->select(
                'doctors.id',
                'doctors.name_en', 'doctors.name_ar',
                'doctors.image', 'doctors.status' ,
                'doctors.main_speciality_en', 'doctors.main_speciality_ar',
                'doctors.academic_title_en', 'doctors.academic_title_ar',
                'doctors.bio_en', 'doctors.bio_ar',
                'doctors.experiences_en' , 'doctors.experiences_ar',
                'doctors.qualifications_en' , 'doctors.qualifications_ar',
            )
            ->first();
        $service = DB::table('doctor_service')->where('doctor_service.doctor_id', $id)
            ->join('services', 'doctor_service.service_id', '=', 'services.id')
            ->where('services.status', 1)->whereNull('services.deleted_at')
            ->distinct()
            ->select(
                'services.name_en as name')
            ->get();
        $doctor->services = $service;
        $doctor->experiences_en = explode(',', $doctor->experiences_en);
        $doctor->experiences_ar = explode(',', $doctor->experiences_ar);
        $doctor->qualifications_en = explode(',', $doctor->qualifications_en);
        $doctor->qualifications_ar = explode(',', $doctor->qualifications_ar);

        return view('*********', compact('doctor'));


    }

}
