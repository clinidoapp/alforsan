<?php

namespace App\Http\Controllers\website\Dto\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceDto extends Controller
{
    public ?int $id;
    public ?string $slug;
    public ?string $name_en;
    public ?string $name_ar;
    public ?string $brief_ar;
    public ?string $brief_en;
    public ?string $description_ar;
    public ?string $description_en;
    public ?string $icon;
    public ?string $image;
    /** @var ServiceFaqsDto[] */
    public ?array $faqs = [];
    /** @var ServiceSymptomDto[] */
    public array $symptoms = [];
    /** @var ServiceTechniqueDto[] */
    public array $techniques = [];
    public ?array $doctors = [];


    public static function toJson($service , $faqs = null , $symptoms = null , $techniques =null , $doctors = null ): ServiceDto
    {
        $result = new ServiceDto();
        $result->id = $service->id;
        $result->slug = $service->slug;
        $result->name_en = $service->name_en;
        $result->name_ar = $service->name_ar;
        $result->brief_en = $service->brief_en;
        $result->brief_ar = $service->brief_ar;
        $result->description_ar = $service->description_ar;
        $result->description_en = $service->description_en;
        $result->icon = $service->icon;
        $result->image = $service->image;
        if ($faqs) {
            foreach ($faqs as $faq) {
                $result->faqs[] = ServiceFaqsDto::toJson($faq);
            }
        }
        if ($symptoms) {
            foreach ($symptoms as $symptom) {
                $result->symptoms[] = ServiceSymptomDto::toJson($symptom);
            }
        }
        if ($techniques) {
            foreach ($techniques as $technique) {
                $result->techniques[] = ServiceTechniqueDto::toJson($technique);
            }
        }
        if ($doctors) {
            foreach ($doctors as $doctor) {
                $result->doctors[] = ServiceDoctorsDto::toJson($doctor);
            }
        }
        return $result;
    }
}
