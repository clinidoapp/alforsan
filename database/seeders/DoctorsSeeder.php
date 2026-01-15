<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academicTitles = [
            ['en' => 'Professor',   'ar' => 'أستاذ'],
            ['en' => 'Consultant',  'ar' => 'استشاري'],
            ['en' => 'Specialist',  'ar' => 'أخصائي'],
        ];

        $specialities = [
            ['en' => 'Cardiology',        'ar' => 'أمراض القلب'],
            ['en' => 'Dermatology',       'ar' => 'الجلدية'],
            ['en' => 'Pediatrics',        'ar' => 'طب الأطفال'],
            ['en' => 'Orthopedics',       'ar' => 'العظام'],
            ['en' => 'Neurology',         'ar' => 'المخ والأعصاب'],
            ['en' => 'Internal Medicine', 'ar' => 'الباطنة'],
            ['en' => 'ENT',               'ar' => 'أنف وأذن'],
        ];
        $names = [
            ['en' => 'Ahmed Hassan',     'ar' => 'أحمد حسن'],
            ['en' => 'Mohamed Ali',      'ar' => 'محمد علي'],
            ['en' => 'Khaled Mahmoud',   'ar' => 'خالد محمود'],
            ['en' => 'Omar Youssef',     'ar' => 'عمر يوسف'],
            ['en' => 'Mahmoud Ibrahim',  'ar' => 'محمود إبراهيم'],
            ['en' => 'Tarek Abdelrahman','ar' => 'طارق عبد الرحمن'],
            ['en' => 'Hany Mostafa',     'ar' => 'هاني مصطفى'],
            ['en' => 'Sherif Fathy',     'ar' => 'شريف فتحي'],
            ['en' => 'Amr Nabil',        'ar' => 'عمرو نبيل'],
            ['en' => 'Ayman Saeed',      'ar' => 'أيمن سعيد'],
            ['en' => 'Yasser Kamal',     'ar' => 'ياسر كمال'],
            ['en' => 'Hossam Eldin',     'ar' => 'حسام الدين'],
            ['en' => 'Sameh Adel',       'ar' => 'سامح عادل'],
            ['en' => 'Walid Samir',      'ar' => 'وليد سمير'],
            ['en' => 'Nader Salah',      'ar' => 'نادر صلاح'],
            ['en' => 'Ashraf Soliman',   'ar' => 'أشرف سليمان'],
            ['en' => 'Moustafa Fawzy',   'ar' => 'مصطفى فوزي'],
            ['en' => 'Karim Amin',       'ar' => 'كريم أمين'],
            ['en' => 'Ehab Farouk',      'ar' => 'إيهاب فاروق'],
            ['en' => 'Fady Magdy',       'ar' => 'فادي مجدي'],
        ];

        $rows = [];

        for ($i = 0; $i <= 19; $i++) {
            $title = $academicTitles[array_rand($academicTitles)];
            $name  = $names[$i];

            $rows[] = [
                'name_en' => $name['en'],
                'name_ar' => $name['ar'],

                'academic_title_en' => $title['en'],
                'academic_title_ar' => $title['ar'],

                'main_speciality_en' => 'Ophthalmology',
                'main_speciality_ar' => 'طب العيون',

                'bio_en' =>
                    'Ophthalmology specialist experienced in diagnosing and treating eye diseases, vision disorders, and performing eye surgeries.',
                'bio_ar' =>
                    'طبيب متخصص في تشخيص وعلاج أمراض العيون واضطرابات الإبصار وإجراء جراحات العيون.',

                'experiences_en' =>
                    'Cataract surgery, Glaucoma management, LASIK procedures, Retina examination, Pediatric ophthalmology',
                'experiences_ar' =>
                    'جراحات المياه البيضاء, علاج الجلوكوما, عمليات تصحيح الإبصار بالليزر, فحص الشبكية, طب عيون الأطفال',

                'qualifications_en' =>
                    'MBBS, Master of Ophthalmology, Fellowship in Retina, Board Certified Ophthalmologist',
                'qualifications_ar' =>
                    'بكالوريوس طب وجراحة, ماجستير طب العيون, زمالة الشبكية, بورد طب العيون',

                'status'     => 1,
                'is_deleted' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('doctors')->insert($rows);



    }
}
