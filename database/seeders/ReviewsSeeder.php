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
                'Excellent service and very professional doctor.',
                'Highly recommended, great experience.',
                'Very satisfied with the treatment.',
            ],
            4 => [
                'Good service and friendly staff.',
                'Doctor was helpful and explained everything clearly.',
            ],
            3 => [
                'Service was okay, waiting time was a bit long.',
                'Average experience.',
            ],
            2 => [
                'Not fully satisfied with the service.',
                'Needs better organization.',
            ],
            1 => [
                'Poor experience, would not recommend.',
                'Very disappointing visit.',
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
