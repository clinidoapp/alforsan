<?php

namespace App\Http\Controllers\website\Dto\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceFaqsDto extends Controller
{
    public ?int $id;
    public ?int $service_id;
    public ?string $question_en;
    public ?string $question_ar;
    public ?string $answer_en;
    public ?string $answer_ar;
    public static function toJson($faqs): ServiceFaqsDto
    {
        $result = new ServiceFaqsDto();
        $result->id = $faqs->id;
        $result->service_id = $faqs->service_id;
        $result->question_en = $faqs->question_en;
        $result->question_ar = $faqs->question_ar;
        $result->answer_en = $faqs->answer_en;
        $result->answer_ar = $faqs->answer_ar;
        return $result;
    }
}
