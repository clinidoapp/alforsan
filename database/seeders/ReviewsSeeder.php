<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requestIds = DB::table('book_requests')->pluck('id')->toArray();

        $comments = [
            5 => [
                'Excellent service and a very professional doctor.',
                'Highly recommended, outstanding experience.',
                'Very satisfied with the treatment and care.',
                'Great attention to detail and patient care.',
                'خدمة ممتازة وطبيب محترف جدًا.',
                'تجربة رائعة وتعامل راقي جدًا.',
            ],
            4 => [
                'Good service with friendly and helpful staff.',
                'Doctor was professional and explained everything clearly.',
                'Overall a very positive experience.',
                'Comfortable visit and good follow-up.',
                'خدمة جيدة جدًا وتعامل محترم.',
                'تجربة مريحة وشرح واضح من الطبيب.',
            ],
            3 => [
                'Decent experience with acceptable service quality.',
                'Service was good and the doctor was polite.',
                'Everything went smoothly overall.',
                'تجربة مقبولة وتعامل لطيف.',
                'الخدمة كانت جيدة بشكل عام.',
            ],
            2 => [
                'Service was fine but could be improved.',
                'The experience was acceptable overall.',
                'Staff was polite and cooperative.',
                'التجربة كانت جيدة ولكن تحتاج تحسين بسيط.',
                'تعامل محترم والخدمة مقبولة.',
            ],
            1 => [
                'Good intentions and respectful staff.',
                'The doctor was polite and tried to help.',
                'Friendly environment despite some delays.',
                'طاقم العمل متعاون والتعامل لطيف.',
                'التجربة كانت إيجابية بشكل عام.',
            ],
        ];

        $rows = [];

        foreach ($requestIds as $requestId) {
            $rate = rand(1, 5);
            $commentList = $comments[$rate];

            $rows[] = [
                'request_id' => $requestId,
                'rate'       => $rate,
                'comment'    => $commentList[array_rand($commentList)],
                'status'     => rand(0, 1), // published / hidden
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('reviews')->insert($rows);
    }
}
