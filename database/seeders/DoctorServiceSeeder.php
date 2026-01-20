<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctorIds  = DB::table('doctors')->pluck('id')->toArray();
        $serviceIds = DB::table('services')->pluck('id')->toArray();
        $rows = [];
        foreach ($doctorIds as $doctorId) {

            $randomServices = collect($serviceIds)
                ->shuffle()
                ->take(rand(3, 6));

            foreach ($randomServices as $serviceId) {
                $rows[] = [
                    'doctor_id'  => $doctorId,
                    'service_id' => $serviceId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('doctor_service')->insert($rows);


    }
}
