<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us')->insert([

            'mission_en' => 'Our mission is to provide high quality healthcare services.',
            'mission_ar' => 'مهمتنا هي تقديم خدمات رعاية صحية عالية الجودة.',

            'vision_en' => 'To be the leading healthcare provider in the region.',
            'vision_ar' => 'أن نكون المزود الرائد للرعاية الصحية في المنطقة.',

            'our_story_en' => 'Our journey started with a simple goal: care for people.',
            'our_story_ar' => 'بدأت رحلتنا بهدف بسيط: رعاية الناس.',

            'recovery_count' => '5000+',
            'doctors_count' => '120+',
            'experience_years' => '15+',

            'value1_title_en' => 'Compassion',
            'value1_title_ar' => 'الرحمة',
            'value1_desc_en' => 'We treat patients with empathy.',
            'value1_desc_ar' => 'نعامل المرضى بتعاطف.',

            'value2_title_en' => 'Integrity',
            'value2_title_ar' => 'النزاهة',
            'value2_desc_en' => 'We act with honesty.',
            'value2_desc_ar' => 'نتصرف بصدق.',

            'value3_title_en' => 'Excellence',
            'value3_title_ar' => 'التميز',
            'value3_desc_en' => 'We strive for excellence.',
            'value3_desc_ar' => 'نسعى للتميز.',

            'value4_title_en' => 'Innovation',
            'value4_title_ar' => 'الابتكار',
            'value4_desc_en' => 'We embrace new technologies.',
            'value4_desc_ar' => 'نواكب أحدث التقنيات.',

            'value5_title_en' => 'Teamwork',
            'value5_title_ar' => 'العمل الجماعي',
            'value5_desc_en' => 'We work together.',
            'value5_desc_ar' => 'نعمل بروح الفريق.',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
