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
                'name_en' => 'Retinal Detachment Surgery',
                'name_ar' => 'جراحات انفصال الشبكية',
                'description_en' => 'Advanced surgical procedures to treat retinal detachment and restore vision.',
                'description_ar' => 'إجراءات جراحية متقدمة لعلاج انفصال الشبكية واستعادة القدرة على الإبصار.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Pediatric & Strabismus Ophthalmology',
                'name_ar' => 'طب وجراحة عيون الأطفال والحول',
                'description_en' => 'Diagnosis and treatment of eye diseases, strabismus, and vision problems in children.',
                'description_ar' => 'تشخيص وعلاج أمراض العيون والحول ومشاكل الإبصار لدى الأطفال.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Glaucoma Treatment',
                'name_ar' => 'علاج المياه الزرقاء (الجلوكوما)',
                'description_en' => 'Early diagnosis and treatment of glaucoma to prevent vision loss.',
                'description_ar' => 'التشخيص المبكر وعلاج الجلوكوما للحفاظ على النظر ومنع فقدانه.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Retinal & Vitreous Diseases',
                'name_ar' => 'علاج أمراض الشبكية والجسم الزجاجي',
                'description_en' => 'Comprehensive care for retinal and vitreous body diseases using modern techniques.',
                'description_ar' => 'علاج شامل لأمراض الشبكية والجسم الزجاجي باستخدام أحدث التقنيات الطبية.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Cataract Surgery',
                'name_ar' => 'جراحات المياه البيضاء',
                'description_en' => 'Safe and effective cataract removal surgeries to improve vision clarity.',
                'description_ar' => 'إجراء جراحات آمنة وفعالة لإزالة المياه البيضاء وتحسين وضوح الرؤية.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Laser Vision Correction',
                'name_ar' => 'تصحيح الإبصار بالليزر',
                'description_en' => 'Laser procedures to correct myopia, hyperopia, and astigmatism.',
                'description_ar' => 'إجراءات الليزر لتصحيح قصر وطول النظر والاستجماتيزم.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Diabetic Retinopathy Treatment',
                'name_ar' => 'شبكية مرضى السكري',
                'description_en' => 'Specialized care for diabetic eye diseases to prevent complications.',
                'description_ar' => 'رعاية متخصصة لعلاج أمراض العين الناتجة عن مرض السكري ومنع المضاعفات.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Genetic Eye Diseases',
                'name_ar' => 'أمراض العيون الوراثية',
                'description_en' => 'Diagnosis and management of inherited eye diseases.',
                'description_ar' => 'تشخيص ومتابعة وعلاج أمراض العيون الوراثية.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Dry Eye & Ocular Surface Diseases',
                'name_ar' => 'علاج جفاف العين وأمراض سطح العين',
                'description_en' => 'Advanced treatment plans for chronic dry eye and surface eye disorders.',
                'description_ar' => 'خطط علاج متقدمة لحالات جفاف العين المزمنة وأمراض سطح العين.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Corneal Diseases',
                'name_ar' => 'أمراض القرنية',
                'description_en' => 'Treatment of corneal infections, inflammation, and degenerative conditions.',
                'description_ar' => 'علاج التهابات القرنية وأمراضها المختلفة والحالات التنكسية.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Optic Nerve Diseases',
                'name_ar' => 'أمراض أعصاب العين',
                'description_en' => 'Diagnosis and management of optic nerve disorders affecting vision.',
                'description_ar' => 'تشخيص وعلاج أمراض أعصاب العين التي تؤثر على الإبصار.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Refractive Errors Treatment',
                'name_ar' => 'علاج عيوب الإبصار',
                'description_en' => 'Medical and optical solutions for refractive vision problems.',
                'description_ar' => 'حلول طبية وبصرية لعلاج عيوب الإبصار المختلفة.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Low Vision Rehabilitation Clinics',
                'name_ar' => 'العيادات البصرية لضعاف البصر',
                'description_en' => 'Specialized clinics to help patients with low vision improve daily activities.',
                'description_ar' => 'عيادات متخصصة لمساعدة ضعاف البصر على تحسين جودة حياتهم.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
            [
                'name_en' => 'Therapeutic Laser',
                'name_ar' => 'الليزر العلاجي',
                'description_en' => 'Therapeutic laser treatments for various retinal and eye conditions.',
                'description_ar' => 'استخدام الليزر العلاجي في علاج العديد من أمراض الشبكية والعيون.',
                'brief_en'=> 'في مركز الفرسان، نضع سلامتك ورضاك في المقام الأول. نستخدم أحدث أجهزة الليزر العالمية المعتمدة من هيئة الغذاء والدواء الأمريكية لضمان الدقة والأمان. يقوم فريقنا الطبي المتخصص بإجراء فحص شامل ودقيق جداً لعينيك باستخدام أحدث أجهزة التشخيص، لتحديد التقنية الأنسب والأكثر أماناً لحالتك الفردية. خبرتنا الواسعة وآلاف العمليات الناجحة تمنحك الثقة والطمأنينة',
                'brief_ar'=> 'At Al Forsan Center, your safety and satisfaction are our top priorities. We use the latest FDA-approved laser technology to ensure precision and safety. Our specialized medical team conducts a comprehensive and highly accurate eye examination using state-of-the-art diagnostic equipment to determine the most suitable and safest technique for your individual case. Our extensive experience and thousands of successful procedures give you confidence and peace of mind.' ,

            ],
        ];
        foreach ($services as $service) {
            DB::table('services')->insert([
                'name_en' => $service['name_en'],
                'name_ar' => $service['name_ar'],
                'description_en' => $service['description_en'],
                'description_ar' => $service['description_ar'],
                'brief_en' => $service['brief_en'],
                'brief_ar' => $service['brief_ar'],
                'status' => 1,
                'icon' => 'icon.svg',
                'image' => 'image.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
