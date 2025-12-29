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

        $videos = [
            [
                'video_url' => 'https://www.youtube.com/watch?v=example1',
            ],
            [
                'video_url' => 'https://www.youtube.com/watch?v=example2',
            ],
            [
                'video_url' => 'https://www.youtube.com/watch?v=example3',
            ],
        ];

        foreach ($doctors as $doctorId) {
            foreach ($videos as $video) {
                DB::table('doctor_videos')->insert([
                    'doctor_id' => $doctorId,
                    'video_url' => $video['video_url'],
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
