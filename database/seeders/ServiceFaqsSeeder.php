<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceFaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = DB::table('services')->get();


        foreach ($services as $service) {
            $faqs = [
                [
                    'question_ar' => 'هل الإجراء آمن؟',
                    'question_en' => 'Is the procedure safe?',
                    'answer_ar' => 'نعم، يتم إجراء الخدمة باستخدام أحدث التقنيات الطبية وتحت إشراف متخصصين.',
                    'answer_en' => 'Yes, the service is performed using advanced medical technologies under expert supervision.',
                ],
                [
                    'question_ar' => 'هل تحتاج الخدمة إلى تخدير؟',
                    'question_en' => 'Does the service require anesthesia?',
                    'answer_ar' => 'يحدد الطبيب نوع التخدير المناسب حسب الحالة ونوع الخدمة.',
                    'answer_en' => 'The type of anesthesia depends on the case and the service provided.',
                ],
                [
                    'question_ar' => 'كم تستغرق مدة الإجراء؟',
                    'question_en' => 'How long does the procedure take?',
                    'answer_ar' => 'غالبًا تستغرق الخدمة وقتًا قصيرًا ويتم تحديد المدة بعد الفحص.',
                    'answer_en' => 'The procedure usually takes a short time and is determined after examination.',
                ],
                [
                    'question_ar' => 'متى يمكن العودة للحياة الطبيعية؟',
                    'question_en' => 'When can I return to normal activities?',
                    'answer_ar' => 'في معظم الحالات يمكن العودة للحياة الطبيعية خلال فترة قصيرة.',
                    'answer_en' => 'In most cases, patients can return to normal activities shortly after.',
                ],
            ];

            foreach ($faqs as $faq) {
                DB::table('service_faqs')->insert([
                    'service_id' => $service->id,
                    'question_ar' => $faq['question_ar'],
                    'question_en' => $faq['question_en'],
                    'answer_ar' => $faq['answer_ar'],
                    'answer_en' => $faq['answer_en'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

        }


    }
}
