<?php

namespace App\Enums;

enum AcademicTitle: string
{
    case Specialist = 'specialist';
    case Professor  = 'professor';
    case Consultant = 'consultant';
    case Lecturer = 'lecturer';
    case Fellowship = 'fellowship';
    case Assistant_Lecturer  = 'assistantLecturer';

    case Assistant_Professor = 'assistantProfessor';



    private const TITLES = [
        'specialist' => [
            'en' => 'Specialist',
            'ar' => 'أخصائي',
        ],
        'professor' => [
            'en' => 'Professor',
            'ar' => 'استاذ جامعى',
        ],
        'consultant' => [
            'en' => 'Consultant',
            'ar' => 'استشاري',
        ],
        'lecturer' => [
            'en' => 'Lecturer',
            'ar' => 'مدرس جامعى',
        ],
        'fellowship' => [
            'en' => 'Fellowship',
            'ar' => 'زمالة',
        ],
        'assistantLecturer' => [
            'en' => 'Assistant Lecturer',
            'ar' => 'مدرس مساعد',
        ],
        'assistantProfessor' => [
            'en' => 'Assistant Professor',
            'ar' => 'أستاذ مساعد',
        ],
    ];
    public function label(string $lang = 'en'): string
    {
        return self::TITLES[$this->value][$lang];
    }

    public static function dropdown(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [
                $case->value => $case->label('en')
            ])
            ->toArray();
    }



}
