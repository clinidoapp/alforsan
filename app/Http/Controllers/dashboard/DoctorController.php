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
            //TODO SELECT
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
       $doctor_id = DB::table('doctors')->insertGetId([
            'name_en' => $data['name_en'],
            'name_ar' => $data['name_ar'],

            'academic_title_ar' => $data['academic_title_ar'],
            'academic_title_en' => $data['academic_title_en'],
            'main_speciality_ar' => $data['main_speciality_ar'],
            'main_speciality_en' => $data['main_speciality_en'],

            'bio_ar' => $data['bio_ar'],
            'bio_en' => $data['bio_en'],
            'experience_ar' => $data['experience_ar'],
            'experience_en' => $data['experience_en'],
            'qualification_ar' => $data['qualification_ar'],
            'qualification_en' => $data['qualification_en'],

            'image' => $image_name,
            'status' => $data['status'],

        ]);




        dd($data);

        return view('********');
    }







}
