<?php

namespace App\Enums;

enum AcademicTitle: string
{
    case SPECIALIST = 'specialist';
    case PROFESSOR  = 'professor';
    case CONSULTANT = 'consultant';

    private const TITLES = [
        'specialist' => [
            'en' => 'Specialist',
            'ar' => 'أخصائي',
        ],
        'professor' => [
            'en' => 'Professor',
            'ar' => 'أستاذ',
        ],
        'consultant' => [
            'en' => 'Consultant',
            'ar' => 'استشاري',
        ],
    ];

    public function label(string $lang = 'en'): string
    {
        return self::TITLES[$this->value][$lang];
    }




}
