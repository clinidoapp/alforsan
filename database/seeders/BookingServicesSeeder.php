<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingServicesSeeder extends Seeder
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
            ],
            [
                'name_en' => 'Laser Vision Correction',
                'name_ar' => 'تصحيح الإبصار بالليزر',
            ],
            [
                'name_en' => 'Cataract Surgery',
                'name_ar' => 'جراحة المياه البيضاء',
            ],
            [
                'name_en' => 'Glaucoma Treatment',
                'name_ar' => 'علاج المياه الزرقاء',
            ],
            [
                'name_en' => 'Retina Examination',
                'name_ar' => 'فحص الشبكية',
            ],
            [
                'name_en' => 'Diabetic Eye Care',
                'name_ar' => 'متابعة شبكية مرضى السكري',
            ],
            [
                'name_en' => 'Pediatric Ophthalmology',
                'name_ar' => 'عيون الأطفال',
            ],
            [
                'name_en' => 'Dry Eye Treatment',
                'name_ar' => 'علاج جفاف العين',
            ],
            [
                'name_en' => 'Cornea Treatment',
                'name_ar' => 'علاج أمراض القرنية',
            ],
            [
                'name_en' => 'Optic Nerve Examination',
                'name_ar' => 'فحص أعصاب العين',
            ],
        ];

        foreach ($services as $service) {
            DB::table('booking_services')->insert([
                'name_en' => $service['name_en'],
                'name_ar' => $service['name_ar'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
