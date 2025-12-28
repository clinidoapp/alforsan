<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name_en' => 'Eye Examination',
                'name_ar' => 'كشف عيون',
                'description_en' => 'Comprehensive eye examination to assess vision and eye health.',
                'description_ar' => 'فحص شامل للعين لتقييم قوة الإبصار وصحة العين.',
            ],
            [
                'name_en' => 'Cataract Surgery',
                'name_ar' => 'جراحة المياه البيضاء',
                'description_en' => 'Surgical removal of cataracts to restore clear vision.',
                'description_ar' => 'إجراء جراحي لإزالة المياه البيضاء واستعادة وضوح الرؤية.',
            ],
            [
                'name_en' => 'LASIK Eye Surgery',
                'name_ar' => 'تصحيح الإبصار بالليزر',
                'description_en' => 'Laser vision correction to treat myopia, hyperopia, and astigmatism.',
                'description_ar' => 'تصحيح النظر بالليزر لعلاج قصر وطول النظر والاستجماتيزم.',
            ],
            [
                'name_en' => 'Glaucoma Treatment',
                'name_ar' => 'علاج الجلوكوما',
                'description_en' => 'Diagnosis and treatment of glaucoma to prevent vision loss.',
                'description_ar' => 'تشخيص وعلاج مرض الجلوكوما للحفاظ على النظر.',
            ],
            [
                'name_en' => 'Retina Examination',
                'name_ar' => 'فحص الشبكية',
                'description_en' => 'Detailed examination of the retina for early disease detection.',
                'description_ar' => 'فحص دقيق للشبكية لاكتشاف الأمراض مبكرًا.',
            ],
            [
                'name_en' => 'Diabetic Eye Care',
                'name_ar' => 'علاج اعتلال الشبكية السكري',
                'description_en' => 'Monitoring and treatment of diabetic retinopathy.',
                'description_ar' => 'متابعة وعلاج اعتلال الشبكية الناتج عن مرض السكري.',
            ],
            [
                'name_en' => 'Pediatric Ophthalmology',
                'name_ar' => 'طب عيون الأطفال',
                'description_en' => 'Diagnosis and treatment of eye problems in children.',
                'description_ar' => 'تشخيص وعلاج مشاكل العيون لدى الأطفال.',
            ],
            [
                'name_en' => 'Dry Eye Treatment',
                'name_ar' => 'علاج جفاف العين',
                'description_en' => 'Advanced treatment for chronic dry eye conditions.',
                'description_ar' => 'علاج متقدم لحالات جفاف العين المزمنة.',
            ],
            [
                'name_en' => 'Cornea Treatment',
                'name_ar' => 'علاج القرنية',
                'description_en' => 'Treatment of corneal diseases and infections.',
                'description_ar' => 'علاج أمراض والتهابات القرنية.',
            ],
            [
                'name_en' => 'Eye Pressure Measurement',
                'name_ar' => 'قياس ضغط العين',
                'description_en' => 'Measurement of intraocular pressure for glaucoma screening.',
                'description_ar' => 'قياس ضغط العين للكشف المبكر عن الجلوكوما.',
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'name_en' => $service['name_en'],
                'name_ar' => $service['name_ar'],
                'description_en' => $service['description_en'],
                'description_ar' => $service['description_ar'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
