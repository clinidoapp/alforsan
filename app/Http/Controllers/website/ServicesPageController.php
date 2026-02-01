<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\website\Dto\Services\ServiceDto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesPageController extends Controller
{
    public function listServices(){

        $services = DB::table('services')
            ->where('status', 1)
            ->select('id','name_en' , 'name_ar' , 'icon' , 'slug')
            ->whereNotNull('icon')
            ->get();
        return view('website.pages.services', compact('services'));

    }
    public function serviceDetails($slug){

         $service = DB::table('services')
             ->where('slug', $slug)
             ->where('status', 1)
             ->whereNotNull('icon')
             ->select(
                 'id',
                 'name_en',
                 'name_ar',
                 'icon',
                 'brief_en',
                 'brief_ar',
                 'status',
                 'description_en',
                 'description_ar',
                 'image',
                 'slug'
             )->first();
          $id = $service->id;
         $faqs = DB::table('service_faqs')
             ->where('service_id', $id)
             ->select(
                 'id',
                 'service_id',
                 'question_en',
                 'question_ar',
                 'answer_en',
                 'answer_ar'
             )
             ->get();
         $symptoms = DB::table('service_symptom')
             ->where('service_id', $id)
             ->select(
                 'id',
                 'service_id',
                 'title_en',
                 'title_ar',
                 'description_en',
                 'description_ar'
             )
             ->get();
         $techniques = DB::table('service_techniques')
             ->where('service_id', $id)
             ->select(
                 'id',
                 'service_id',
                 'title_en',
                 'title_ar',
                 'description_en',
                 'description_ar',
                 'suitable_for_en',
                 'suitable_for_ar'
             )
             ->get();
         $doctors = DB::table('doctor_service')->where('service_id', $id)
             ->join('doctors', 'doctor_service.doctor_id', '=', 'doctors.id')
             ->where('doctors.status', 1)
             ->where('doctors.is_deleted', 0)
             ->whereNull('doctors.deleted_at')
             ->select('doctors.id', 'doctors.name_en', 'doctors.name_ar', 'doctors.image', 'doctors.main_speciality_en' , 'doctors.main_speciality_ar')
             ->get()
             ->toArray();
         $result = ServiceDto::toJson($service , $faqs , $symptoms , $techniques , $doctors);
         return view('website.pages.service-details', compact('result'));
    }
}
