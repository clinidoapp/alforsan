<?php

namespace App\Http\Controllers\website\Dto\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceTechniqueDto extends Controller
{
    public ?int $id;
    public ?int $service_id;
    public ?string $title_en;
    public ?string $title_ar;
    public ?string $description_en;
    public ?string $description_ar;
    public ?string $suitable_for_en;
    public ?string $suitable_for_ar;
    public static function toJson($technique): ServiceTechniqueDto
    {
        $result = new ServiceTechniqueDto();
        $result->id = $technique->id;
        $result->service_id = $technique->service_id;
        $result->title_en = $technique->title_en;
        $result->title_ar = $technique->title_ar;
        $result->description_en = $technique->description_en;
        $result->description_ar = $technique->description_ar;
        $result->suitable_for_en = $technique->suitable_for_en;
        $result->suitable_for_ar = $technique->suitable_for_ar;
        return $result;
    }
}
