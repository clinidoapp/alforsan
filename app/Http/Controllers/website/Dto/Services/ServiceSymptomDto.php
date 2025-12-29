<?php

namespace App\Http\Controllers\website\Dto\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceSymptomDto extends Controller
{
    public ?int $id;
    public ?int $service_id;
    public ?string $title_en;
    public ?string $title_ar;
    public ?string $description_en;
    public ?string $description_ar;
    public static function toJson($symptom): ServiceSymptomDto
    {
        $result = new ServiceSymptomDto();
        $result->id = $symptom->id;
        $result->service_id = $symptom->service_id;
        $result->title_en = $symptom->title_en;
        $result->title_ar = $symptom->title_ar;
        $result->description_en = $symptom->description_en;
        $result->description_ar = $symptom->description_ar;
        return $result;
    }
}
