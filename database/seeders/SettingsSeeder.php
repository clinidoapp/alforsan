<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_email',
                'value' => 'info@alforsan.com',
            ],
            [
                'key' => 'site_phone_1',
                'value' => '+201000000000',
            ],[
                'key' => 'site_phone_2',
                'value' => '+201000000000',
            ],[
                'key' => 'site_phone_3',
                'value' => '+201000000000',
            ],[
                'key' => 'site_phone_4',
                'value' => '+201000000000',
            ],
            [
                'key' => 'site_whatsapp',
                'value' => '+201000000000',
            ],
            [
                'key' => 'site_address_en',
                'value' => 'Cairo, Egypt',
            ],
            [
                'key' => 'site_address_ar',
                'value' => 'Cairo, Egypt',
            ],
            [
                'key' => 'facebook_url',
                'value' => 'https://www.facebook.com/alforsan',
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com/alforsan',
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://www.instagram.com/alforsan',
            ],
            [
                'key' => 'youtube_url',
                'value' => 'https://www.youtube.com/alforsan',
            ],
            [
                'key' => 'tiktok_url',
                'value' => 'https://www.linkedin.com/in/alforsan',
            ],
            [
                'key' => 'work_hours_en',
                'value' => 'https://www.linkedin.com/in/alforsan',
            ],
            [
                'key' => 'work_hours_ar',
                'value' => 'https://www.linkedin.com/in/alforsan',
            ]
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}
