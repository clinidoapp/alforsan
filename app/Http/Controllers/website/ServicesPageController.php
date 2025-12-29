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
            ->select('id','name_en' , 'name_ar' , 'icon')
            ->whereNotNull('icon')
            ->get();
        return view('website.pages.services', compact('services'));

    }
    public function serviceDetails($id){

         $service = DB::table('services')
             ->where('id', $id)
             ->where('status', 1)
             ->whereNotNull('icon')
             ->select(
                 'id',
                 'name_en',
                 'name_ar',
                 'icon',
                 'image'
             )->first();
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
         $result = ServiceDto::toJson($service , $faqs , $symptoms , $techniques);
         return view('*********', compact('result'));
    }
}
