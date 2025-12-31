<?php

namespace App\Http\Controllers\website\Dto\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceDoctorsDto extends Controller
{
    public ?int $id;
    public ?string $name_en;
    public ?string $name_ar;
    public ?string $main_speciality_ar;
    public ?string $main_speciality_en;
    public ?string $image;
    public static function toJson($doctor): ServiceDoctorsDto
    {
        $result = new ServiceDoctorsDto();
        $result->id = $doctor->id;
        $result->name_en = $doctor->name_en;
        $result->name_ar = $doctor->name_ar;
        $result->main_speciality_ar = $doctor->main_speciality_ar;
        $result->main_speciality_en = $doctor->main_speciality_en;
        $result->image = $doctor->image;
        return $result;
    }
}
