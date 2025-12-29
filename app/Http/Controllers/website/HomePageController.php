<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function homeContent(){

        if (!session()->has('random_doctors_ids')) {
            $randomIds = DB::table('doctors')
                ->where('status', 1)
                ->where('is_deleted', 0)
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id')
                ->toArray();
           session()->put('random_doctors_ids', $randomIds);
        }

        $doctors = DB::table('doctors')
            ->whereIn('id', session('random_doctors_ids'))
            ->select('id',
                'name_ar' , 'name_en' ,'academic_title_en','academic_title_ar',
                'main_speciality_en' ,'main_speciality_ar' ,
                'image')->get();
        dd(session('random_doctors_ids') , $doctors);

        $services = DB::table('services')
            ->where('status', 1)
            ->select('id','name_en' , 'name_ar' , 'icon')
            ->whereNotNull('icon')
            ->limit(6)->get();

        $reviews =   DB::table('reviews')
            ->where('reviews.status', 1)
            ->join('book_requests', 'reviews.request_id', '=', 'book_requests.id')
            ->join('services', 'book_requests.service_id', '=', 'services.id')
            ->select('reviews.id', 'reviews.rate' , 'reviews.comment' , 'book_requests.name' , 'services.name_ar  as service_name_ar' , 'services.name_en  as service_name_en')
            ->limit(9)
            ->get();

        return view('website.pages.home',compact('doctors','services','reviews'));
    }
}
