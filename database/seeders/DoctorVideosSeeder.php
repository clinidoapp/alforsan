<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = DB::table('doctors')->pluck('id')->toArray();

        if (empty($doctors)) {
            return;
        }

        $videos = [
            [
                'title_en' => 'Laser Vision Correction Explained',
                'title_ar' => 'شرح عملية تصحيح الإبصار بالليزر',
                'video_url' => 'https://www.youtube.com/watch?v=Uto36GI6HIg',
            ],
            [
                'title_en' => 'Cataract Surgery Overview',
                'title_ar' => 'شرح عملية المياه البيضاء',
                'video_url' => 'https://www.youtube.com/watch?v=Uto36GI6HIg',
            ],
            [
                'title_en' => 'Glaucoma Symptoms and Treatment',
                'title_ar' => 'أعراض وعلاج الجلوكوما',
                'video_url' => 'https://www.youtube.com/watch?v=Uto36GI6HIg',
            ],
            [
                'title_en' => 'Retina Diseases Explained',
                'title_ar' => 'شرح أمراض الشبكية',
                'video_url' => 'https://www.youtube.com/watch?v=Uto36GI6HIg',
            ],
        ];

        $rows = [];

        foreach ($doctors as $doctorId) {
            $count = rand(1, 3);
            $selected = collect($videos)->shuffle()->take($count);

            foreach ($selected as $video) {
                $rows[] = [
                    'doctor_id' => $doctorId,
                    'video_url' => $video['video_url'],
                    'title_en'  => $video['title_en'],
                    'title_ar'  => $video['title_ar'],
                    'status'    => 1,
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ];
            }
        }

        DB::table('doctor_videos')->insert($rows);
    }
}
