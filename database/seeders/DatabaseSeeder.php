<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        //    DoctorsSeeder::class,
        //    ServicesSeeder::class,
        //    DoctorServiceSeeder::class,
        //    BookRequestsSeeder::class,
        //    ReviewsSeeder::class,
        //    ServiceFaqsSeeder::class,
        //    ServiceSymptomsSeeder::class,
        //    ServiceTechniquesSeeder::class,
        //    DoctorVideosSeeder::class,
        //    BookingServicesSeeder::class,
            AdminSeeder::class,
        //    SettingsSeeder::class,
        ]);
    }
}
