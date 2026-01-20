<?php

namespace App\Http\Controllers\dashboard;

use App\Enums\AcademicTitle;
use App\Enums\ImagePaths;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\ImageHandlerService;
use App\Http\Requests\dashboard\Doctors\StoreDoctorMediaRequest;
use App\Http\Requests\dashboard\Doctors\StoreDoctorRequest;
use App\Http\Requests\dashboard\Doctors\UpdateDoctorMediaRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class DoctorController extends Controller
{
    /*** Doctor ***/
    public function listDoctors(Request $request){

        $query= DB::table('doctors')
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
        $search = [
            'doctor_id' => $request->doctor_id ?? null,
            'doctor_name' => $request->doctor_name ?? null,
            'doctor_phone' => $request->doctor_phone ?? null,
        ];
        return view('dashboard.pages.doctors.list', compact('doctors','search'));

    }
    public function addDoctor(){
        $academicTitles = collect(AcademicTitle::cases())
            ->map(fn ($case) => [
                'key'   =>  $case->label('en'),
                'value' => $case->value,
            ])
            ->toArray();

        $services = DB::table('services')
            ->where('status', 1)
            ->select('id','name_en as name' )
            ->get();

        return view('dashboard.pages.doctors.add')->with(['services' => $services , 'academicTitles' => $academicTitles]);
    }
    public function updateDoctor($id){

        $doctor = DB::table('doctors')->where('id', $id)
            ->select(
                'doctors.id',
                'doctors.name_en', 'doctors.name_ar',
                'doctors.image', 'doctors.status' ,
                'doctors.main_speciality_en', 'doctors.main_speciality_ar',
                'doctors.academic_title_en', 'doctors.academic_title_ar',
                'doctors.bio_en', 'doctors.bio_ar',
                'doctors.experiences_en' , 'doctors.experiences_ar',
                'doctors.qualifications_en' , 'doctors.qualifications_ar',
                'doctors.speciality_ar', 'doctors.speciality_en',
            )->first();

        $selectedServices = DB::table('doctor_service')
            ->where('doctor_id', $id)
            ->select('service_id')->get();

        $doctor->selectedServices = $selectedServices;
        $doctor->experiences_en = explode(',', $doctor->experiences_en);
        $doctor->experiences_ar = explode(',', $doctor->experiences_ar);
        $doctor->qualifications_en = explode(',', $doctor->qualifications_en);
        $doctor->qualifications_ar = explode(',', $doctor->qualifications_ar);

        $services = DB::table('services')
            ->where('status', 1)
            ->select('id','name_en as name' )
            ->get();

        return view('dashboard.pages.doctors.edit' , compact('doctor','services'));
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
                'speciality_ar' => $data['speciality_ar'],
                'speciality_en' => $data['speciality_en'],
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

        });

        return redirect()->route('doctors-list');
    }
    public function viewDoctor($id)
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
                'doctors.speciality_ar', 'doctors.speciality_en',
                'doctors.phone', 'doctors.email' ,
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

        return view('dashboard.pages.doctors.details', compact('doctor'));


    }
    public function toggleDoctorStatus($id)
    {
        $doctor = DB::table('doctors')->where('id', $id);
        $currentStatus = $doctor->value('status');
        $newStatus = $currentStatus == 1 ? 0 : 1;
        $doctor->update(['status' => $newStatus]);
        return redirect()->route('doctors-list');
    }
    public function deleteDoctor($id)
    {

        DB::table('doctors')
            ->where('id', $id)
            ->update([
                'is_deleted' => 1,
                'deleted_at' => Carbon::now(),
            ]);
        return redirect()->route('doctors-list');

    }

    /*** Doctor Media ***/
    public function listDoctorMediaCount(Request $request){

        $query = DB::table('doctors')
            ->leftJoin('doctor_videos', 'doctors.id', '=', 'doctor_videos.doctor_id')
            ->where('doctors.is_deleted', 0)->whereNull('doctors.deleted_at')
            ->where('doctor_videos.is_deleted', 0)->whereNull('doctor_videos.deleted_at')
            ->select('doctors.id','doctors.name_en as doctor_name',
                DB::raw('COUNT(doctor_videos.id) as videos_count')
            )
            ->groupBy('doctors.id', 'doctors.name_en');

        if ($request->filled('doctor_id')) {
            $query->where('doctors.id', $request->doctor_id);
        }

        if ($request->filled('doctor_name')) {
            $search = trim($request->doctor_name);
            $search = str_replace(['أ','إ','آ'], 'ا', $search);
            $search = str_replace(['ى','ي'], 'ي', $search);
            $search = str_replace('ة', 'ه', $search);
            $query->where( function ($q) use ($search) {
                $q->where('doctors.name_en', 'like', '%' . $search . '%')
                    ->orWhereRaw("
        REPLACE(
          REPLACE(
            REPLACE(
              REPLACE(
                REPLACE(doctors.name_ar,'أ','ا'),
              'إ','ا'),
            'آ','ا'),
          'ى','ي'),
        'ة','ه')
        LIKE ?
      ", ["%{$search}%"]);
            });
        }

        $doctors = $query->paginate(10);

        $search = [
            'doctor_id' => $request->doctor_id ?? null,
            'doctor_name' => $request->doctor_name ?? null,
        ];
        return view('dashboard.pages.doctors.mediaList', compact('doctors','search'));

    }
    public function listDoctorMedia(Request $request , $id){

        $doctor = DB::table('doctors')
            ->where('id', $id)
            ->where('is_deleted', 0)
            ->whereNull('deleted_at')
            ->select('id', 'name_en')
            ->first();

        $videos = DB::table('doctor_videos')->where('doctor_id', $id)
            ->where('doctor_videos.is_deleted', 0)->whereNull('doctor_videos.deleted_at')
            ->select(
                'doctor_videos.title_en as video_title_en',
                'doctor_videos.title_ar as video_title_ar',
                'doctor_videos.id as video_id' ,
                'doctor_videos.status',
                'doctor_videos.video_url'
            )->paginate(10);

        return view('dashboard.pages.doctors.doctorMediaList', compact('doctor','videos'));
    }
    public function addDoctorMedia($id = null){
        $doctors = DB::table('doctors')
            //->where('status', 1)
            ->where('is_deleted', 0)->whereNull('deleted_at')
            ->select('id','name_en',
                DB::raw("CONCAT(id, '-', name_en) as identifier"))
            ->get();
        $selectedId = $id ?? null;
        $selectedDoctor = null;
        if ($selectedId){
            $selectedDoctor = DB::table('doctors')
                ->where('id', $selectedId)
                ->where('is_deleted', 0)->whereNull('deleted_at')
                ->select('id','name_en',)
                ->first();
        }
       return view('dashboard.pages.doctors.addMedia' , compact('doctors','selectedId','selectedDoctor'));

    }
    public function storeDoctorMedia(StoreDoctorMediaRequest $request)
    {
        $data = $request->validated();
        $doctor_id = $data['doctor_id'];

        DB::transaction(function () use ($data, $doctor_id) {
            foreach ($data['videos'] as $video) {
                DB::table('doctor_videos')->updateOrInsert(
                    [
                        'doctor_id'  => $doctor_id,
                        'video_url' => $video['video_url'],
                    ],
                    [
                        'title_en'  => $video['title_en'],
                        'title_ar'  => $video['title_ar'],
                        'status'    => $video['status'],
                        'created_at'=> now(),
                        'updated_at'=> now(),
                    ]
                );
            }
        });

        return redirect()->route('doctors-list-media');

    }
    public function UpdateDoctorMedia(UpdateDoctorMediaRequest $request)
    {
        $data = $request->validated();
        $video_id = $data['video_id'];
        DB::transaction(function () use ($data, $video_id) {
            DB::table('doctor_videos')->where('id' , $video_id )->update(
                [
                    'title_en'  => $data['title_en'],
                    'title_ar'  => $data['title_ar'],
                    'status'    => $data['status'],
                    'updated_at'=> now(),
                ]
            );
        });

        return redirect()->back();

    }
    public function toggleMediaStatus($id)
    {
        $video = DB::table('doctor_videos')->where('id', $id);
        $currentStatus = $video->value('status');
        $newStatus = $currentStatus == 1 ? 0 : 1;
        $video->update(['status' => $newStatus]);
        return redirect()->back();
    }
    public function deleteDoctorMedia($id)
    {

        DB::table('doctor_videos')
            ->where('id', $id)
            ->update([
                'is_deleted' => 1,
                'deleted_at' => Carbon::now(),
            ]);
        return redirect()->back();

    }



}
