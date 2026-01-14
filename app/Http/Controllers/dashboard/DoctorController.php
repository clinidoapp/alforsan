<?php

namespace App\Http\Controllers\dashboard;

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

        return view('********');
    }
    public function storeDoctor(StoreDoctorRequest $request){

        $data = $request->validated();

        $image_name = null ;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = ImageHandlerService::fileUploader(ImagePaths::DOCTOR_PHOTOS->value,$image,null);
        }
        DB::transaction(function () use ($data, $image_name) {
            $doctor_id = DB::table('doctors')->insertGetId([
                'name_en' => $data['name_en'],
                'name_ar' => $data['name_ar'],

                'academic_title_ar' => $data['academic_title_ar'],
                'academic_title_en' => $data['academic_title_en'],
                'main_speciality_ar' => $data['main_speciality_ar'],
                'main_speciality_en' => $data['main_speciality_en'],

                'bio_ar' => $data['bio_ar'],
                'bio_en' => $data['bio_en'],
                'experiences_ar' => $data['experiences_ar'],
                'experiences_en' => $data['experiences_en'],
                'qualifications_ar' => $data['qualifications_ar'],
                'qualifications_en' => $data['qualifications_en'],

                'image' => $image_name,
                'status' => $data['status'],

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

       // dd('Done');
        return view('********');
    }







}
