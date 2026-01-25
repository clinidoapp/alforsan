<?php

namespace App\Http\Controllers\dashboard;

use App\Enums\ImagePaths;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\ImageHandlerService;
use App\Http\Controllers\website\Dto\Services\ServiceDto;
use App\Http\Requests\dashboard\Services\CreateOrEditServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function servicesList(Request $request)
    {
        $query = DB::table('services')
        ->whereNull('deleted_at')
        ->select('name_en' , 'name_ar' , 'icon' , 'status' , 'id');

        if ($request->filled('service_id')) {
            $query->where('id', $request->service_id);
        }

        if ($request->filled('service_name')) {
            $search = trim($request->service_name);
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

        $services = $query->paginate(10);
        $search = [
            'service_id' => $request->service_id ?? null,
            'service_name' => $request->service_name ?? null,
        ];

        return view('dashboard.pages.services.list' , compact('services' , 'search'));



    }
    public function serviceDetails(Request $request , $id){

        $service = DB::table('services')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->whereNotNull('icon')
            ->select(
                'id',
                'name_en',
                'name_ar',
                'icon',
                'status',
                'brief_en',
                'brief_ar',
                'description_en',
                'description_ar',
                'image',
                'slug'
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

        $result = ServiceDto::toJson($service , $faqs , $symptoms , $techniques );
        return view('dashboard.pages.services.details' , compact('result'));
    }
    public function addServices(Request $request){

        return view('dashboard.pages.services.add');
    }
    public function editServices(Request $request , $id){
        $service = DB::table('services')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->whereNotNull('icon')
            ->select(
                'id',
                'name_en',
                'name_ar',
                'icon',
                'brief_en',
                'brief_ar',
                'description_en',
                'description_ar',
                'image',
                'slug'
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

        $result = ServiceDto::toJson($service , $faqs , $symptoms , $techniques );

        return view('dashboard.pages.services.edit' , compact('result'));
    }
    public function createOrEditService(CreateOrEditServiceRequest $request , $id = null){

        $data = $request->validated();
        DB::transaction(function () use($data , $request , $id){

            //$image_name = ImageHandlerService::fileUploader(ImagePaths::DOCTOR_PHOTOS->value,$image,null);
            $baseSlug = Str::slug($data['name_en']);

            $imagePath = null;
            $iconPath  = null;

            $service = DB::table('services')->where('id', $id)->first();
            if ($request->hasFile('image')) {
                $imagePath = ImageHandlerService::fileUploader(ImagePaths::SERVICES_IMAGES->value, $request->file('image') , $service ? $service->image : null );
            }
            if ($request->hasFile('icon')) {
                $iconPath = ImageHandlerService::fileUploader(ImagePaths::SERVICES_ICONS->value, $request->file('icon') ,$service ? $service->icon : null );
            }


            if ($id) {

                //$service = DB::table('services')->where('id', $id)->first();

                /**
                 if ($request->hasFile('image')) {
                    $imagePath = ImageHandlerService::fileUploader(ImagePaths::SERVICES_IMAGES->value, $request->file('image') ,$service->image );
                }
                if ($request->hasFile('icon')) {
                    $iconPath = ImageHandlerService::fileUploader(ImagePaths::SERVICES_ICONS->value, $request->file('icon') ,$service->icon );
                }
                 **/

                DB::table('services')
                    ->where('id', $id)
                    ->update([
                        'slug' => $baseSlug,
                        'name_en' => $data['name_en'],
                        'name_ar' => $data['name_ar'],
                        'description_en' => $data['bio_en'],
                        'description_ar' => $data['bio_ar'],
                        'brief_en' => $data['brief_en'],
                        'brief_ar' => $data['brief_ar'],
                        'image' => $imagePath ?? $service->image,
                        'icon' => $iconPath ?? $service->icon,
                    ]);

                $serviceId = $id;

                DB::table('service_faqs')->where('service_id', $serviceId)->delete();
                DB::table('service_symptom')->where('service_id', $serviceId)->delete();
                DB::table('service_techniques')->where('service_id', $serviceId)->delete();

            }else {

                $serviceId = DB::table('services')->insertGetId([
                    'slug' => $baseSlug,
                    'name_en' => $data['name_en'],
                    'name_ar' => $data['name_ar'],
                    'description_en' => $data['bio_en'],
                    'description_ar' => $data['bio_ar'],
                    'brief_en' => $data['brief_en'],
                    'brief_ar' => $data['brief_ar'],
                    'image' => $imagePath,
                    'icon' => $iconPath,
                ]);
            }

            if ($data['faqs']) {
                DB::table('service_faqs')->insert(
                    collect($data['faqs'])->map(fn ($faq) => [
                        'service_id' => $serviceId,
                        'question_en'   => $faq['question_en'],
                        'question_ar'   => $faq['question_ar'],
                        'answer_en'   => $faq['answer_en'],
                        'answer_ar'   => $faq['answer_ar'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ])->toArray()
                );
            }

            if ($data['symptoms']) {
                DB::table('service_symptoms')->insert(
                    collect($data['symptoms'])->map(fn ($symptom) => [
                        'service_id' => $serviceId,
                        'description_en' => $symptom['description_en'],
                        'description_ar' => $symptom['description_ar'],
                        'title_en' => $symptom['title_en'],
                        'title_ar' => $symptom['title_ar'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ])->toArray()
                );
            }

            if ($data['techniques']) {
                DB::table('service_techniques')->insert(
                    collect($data['techniques'])->map(fn ($technique) => [
                        'service_id' => $serviceId,
                        'description_en' => $technique['description_en'],
                        'description_ar' => $technique['description_ar'],
                        'title_en' => $technique['title_en'],
                        'title_ar' => $technique['title_ar'],
                        'suitable_for_en' => $technique['suitable_for_en'],
                        'suitable_for_ar' => $technique['suitable_for_ar'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ])->toArray()
                );
            }
        });
        return view('dashboard.********');
    }

    public static function Create()
    {

    }

    public static function Update()
    {


    }





    public function toggleServicesStatus($id)
    {
        $service = DB::table('services')->where('id', $id);
        $currentStatus = $service->value('status');
        $newStatus = $currentStatus == 1 ? 0 : 1;
        $service->update(['status' => $newStatus]);
        return redirect()->back();
    }
}
