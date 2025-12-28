<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTechniquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = DB::table('services')->get();

        foreach ($services as $service) {

            // تقنيات شائعة في طب العيون
            $techniques = [
                [
                    'title_en' => 'LASIK',
                    'title_ar' => 'الليزك',
                    'description_en' =>
                        'A laser-based procedure used to correct refractive vision problems quickly and effectively.',
                    'description_ar' =>
                        'إجراء يعتمد على الليزر لتصحيح عيوب الإبصار بسرعة وفاعلية.',
                    'suitable_for_en' =>
                        'Suitable for patients with stable vision and healthy corneas.',
                    'suitable_for_ar' =>
                        'مناسبة للمرضى الذين لديهم ثبات في درجة النظر وسلامة القرنية.',
                ],
                [
                    'title_en' => 'Femto LASIK',
                    'title_ar' => 'الفيمتو ليزك',
                    'description_en' =>
                        'Advanced laser technique that uses femtosecond laser for higher precision.',
                    'description_ar' =>
                        'تقنية ليزر متقدمة تعتمد على ليزر الفيمتو ثانية لتحقيق دقة أعلى.',
                    'suitable_for_en' =>
                        'Ideal for patients with thin corneas or higher visual requirements.',
                    'suitable_for_ar' =>
                        'مثالية لمرضى القرنية الرقيقة أو أصحاب المتطلبات البصرية العالية.',
                ],
                [
                    'title_en' => 'PRK',
                    'title_ar' => 'الليزر السطحي (PRK)',
                    'description_en' =>
                        'Surface laser technique suitable for patients not eligible for LASIK.',
                    'description_ar' =>
                        'تقنية ليزر سطحي مناسبة للحالات التي لا يناسبها الليزك.',
                    'suitable_for_en' =>
                        'Suitable for patients with thin corneas or active lifestyles.',
                    'suitable_for_ar' =>
                        'مناسبة لمرضى القرنية الرقيقة أو أصحاب الأنشطة البدنية العالية.',
                ],
                [
                    'title_en' => 'ICL Lens Implantation',
                    'title_ar' => 'زراعة العدسات',
                    'description_en' =>
                        'Implantable lenses used to correct severe refractive errors.',
                    'description_ar' =>
                        'زراعة عدسات داخل العين لتصحيح درجات الإبصار العالية.',
                    'suitable_for_en' =>
                        'Recommended for patients with high myopia or unsuitable for laser.',
                    'suitable_for_ar' =>
                        'مناسبة للحالات التي تعاني من قصر نظر شديد أو لا يناسبها الليزر.',
                ],
            ];

            foreach ($techniques as $technique) {
                DB::table('service_techniques')->insert([
                    'service_id'       => $service->id,
                    'title_en'         => $technique['title_en'],
                    'title_ar'         => $technique['title_ar'],
                    'description_en'   => $technique['description_en'],
                    'description_ar'   => $technique['description_ar'],
                    'suitable_for_en'  => $technique['suitable_for_en'],
                    'suitable_for_ar'  => $technique['suitable_for_ar'],
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ]);
            }
        }
    }
}
