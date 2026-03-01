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
        $row = DB::table('about_us')->first();
        DB::table('about_us')->updateOrInsert(
                ['id' => 1],
                [

                'mission_en' => 'Our mission is to preserve the blessing of vision for our patients by providing the latest diagnostic and treatment methods, in a safe and comfortable environment that reassures you, and in the hands of a medical team of experts who put the patient first and deal with them with all professionalism and humanity to achieve complete recovery.',
                'mission_ar' => 'رسالتنا هي الحفاظ على نعمة الإبصار لمرضانا من خلال تقديم أحدث طرق التشخيص والعلاج، في بيئة آمنة ومريحة تمنحك الطمأنينة، وبأيدي فريق طبي من الخبراء الذين يضعون المريض في المقام الأول ويتعاملون معه بكل احترافية وإنسانية للوصول إلى الشفاء التام.',

                'vision_en' => 'A leading hospital in the field of ophthalmology and surgery, providing exceptional care of the highest international medical standards, blended with our deeply held humanitarian values in treating our patients.',
                'vision_ar' => 'أن تكون مستشفى الفرسان رائدة في مجال طب وجراحة العيون، لتقديم رعاية استثنائية على أعلى المعايير الطبية العالمية، ممزوجة بقيمنا الإنسانية الراسخة في التعامل مع مرضانا.',

                'our_story_en' => 'Alforsan Eye Hospital was founded by an elite group of ophthalmology professors who were united by a common passion to provide a different model of healthcare in the field of eyes care, combining long-standing academic experience, the latest advanced technologies, and high-end human interaction. We started with a dream, and today we are proud of the confidence of thousands of patients who chose Alforsan Eye Care Hospital.',
                'our_story_ar' => 'تأسست مستشفى الفرسان للعيون على يد نخبة من أساتذة طب العيون الذين جمعهم شغف مشترك تقديم نموذج مختلف للرعاية الصحية في مجال العيون، يجمع بين الخبرة الأكاديمية العريقة وأحدث التقنيات المتطورة والتعامل الإنساني الراقي. بدأنا بحلم، واليوم نفخر بثقة آلاف المرضى الذين اختاروا مستشفى الفرسان لرعاية أعينهم',

                'recovery_count' => '50000+',
                'doctors_count' => '100+',
                'experience_years' => '13+',

                'value1_title_en' => 'Medical Excellence',
                'value1_title_ar' => 'التميز الطبي',
                'value1_desc_en' => 'We always strive to provide the highest quality in diagnosis and treatment.',
                'value1_desc_ar' => 'نسعى دائماً لتقديم أعلى مستويات الجودة في التشخيص والعلاج',

                'value2_title_en' => 'Safety first',
                'value2_title_ar' => 'الأمان أولاً',
                'value2_desc_en' => 'We adhere to the highest professional and ethical standards in our work.',
                'value2_desc_ar' => 'نلتزم بأعلى المعايير المهنية والأخلاقية في عملنا',

                'value3_title_en' => 'Professionalism',
                'value3_title_ar' => 'الاحترافية',
                'value3_desc_en' => 'We strive for excellence.',
                'value3_desc_ar' => 'نسعى للتميز.',

                'value4_title_en' => 'Humanity',
                'value4_title_ar' => 'الإنسانية',
                'value4_desc_en' => 'We treat every patient with respect, empathy, and understanding of their concerns.',
                'value4_desc_ar' => 'نتعامل مع كل مريض باحترام وتعاطف وتفهم لمخاوفه',

                'value5_title_en' => 'Continuous development',
                'value5_title_ar' => 'التطوير المستمر',
                'value5_desc_en' => 'We keep up with the latest scientific and technological developments in the field of ophthalmology.',
                'value5_desc_ar' => 'نواكب أحدث التطورات العلمية والتقنية في مجال طب العيون',

                'created_at' => now(),
                'updated_at' => now(),
            ]);

    }
}
