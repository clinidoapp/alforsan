<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceIds = DB::table('services')->pluck('id')->toArray();

        $names = [
            'محمد علي',
            'أحمد حسن',
            'سارة محمد',
            'عمر خالد',
            'منى عادل',
            'يوسف أحمد',
            'ندى إبراهيم',
            'خالد مصطفى',
            'ريم محمود',
            'محمود عبد الله',
        ];
        $notes = [
            'كشف عيون بسبب ضعف الإبصار.',
            'متابعة بعد عملية عيون سابقة.',
            'ألم واحمرار في العين.',
            'فحص نظر لعمل نظارة.',
            'استشارة بخصوص تصحيح الإبصار بالليزر.',
            'فحص عيون دوري.',
            'متابعة اعتلال الشبكية السكري.',
        ];
        $rows = [];
        for ($i = 1; $i <= 20; $i++) {
            $name = $names[array_rand($names)];

            $rows[] = [
                'name'  => $name,
                'phone' => '01' . rand(0, 2) . rand(100000000, 999999999),
                'email' => 'patient' . $i . '@mail.com',

                'service_id' => $serviceIds[array_rand($serviceIds)],
                'notes'      => $notes[array_rand($notes)],

                'status' => rand(0, 3), // pending / approved / cancelled / completed

                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now(),
            ];
        }

        DB::table('book_requests')->insert($rows);



    }
}
