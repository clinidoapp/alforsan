<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSymptomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = DB::table('services')->get();

        $symptoms = [
            [
                'title_en' => 'Blurred Vision',
                'title_ar' => 'تشوش الرؤية',
                'description_en' => 'Difficulty seeing clearly at near or far distances.',
                'description_ar' => 'صعوبة في رؤية الأشياء بوضوح سواء عن قرب أو بعد.',
            ],
            [
                'title_en' => 'Eye Pain',
                'title_ar' => 'ألم في العين',
                'description_en' => 'Persistent or intermittent pain in one or both eyes.',
                'description_ar' => 'ألم مستمر أو متقطع في إحدى العينين أو كلتيهما.',
            ],
            [
                'title_en' => 'Eye Redness',
                'title_ar' => 'احمرار العين',
                'description_en' => 'Redness caused by inflammation or infection.',
                'description_ar' => 'احمرار ناتج عن التهاب أو عدوى في العين.',
            ],
            [
                'title_en' => 'Headache',
                'title_ar' => 'الصداع',
                'description_en' => 'Headaches associated with eye strain or vision problems.',
                'description_ar' => 'صداع ناتج عن إجهاد العين أو مشاكل الإبصار.',
            ],
            [
                'title_en' => 'Sensitivity to Light',
                'title_ar' => 'الحساسية للضوء',
                'description_en' => 'Discomfort or pain when exposed to bright light.',
                'description_ar' => 'عدم ارتياح أو ألم عند التعرض للضوء الساطع.',
            ],
        ];

        foreach ($services as $service) {
            foreach ($symptoms as $symptom) {
                DB::table('service_symptom')->insert([
                    'service_id'     => $service->id,
                    'title_en'       => $symptom['title_en'],
                    'title_ar'       => $symptom['title_ar'],
                    'description_en' => $symptom['description_en'],
                    'description_ar' => $symptom['description_ar'],
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);
            }
        }


    }
}
