<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function aboutUs(Request $request){
        $aboutUs =  DB::table('about_us')->select('*')->first();
        return view('dashboard.pages.about_us.list', compact('aboutUs'));
    }

public function getAboutUs()
    {
        $about = DB::table('about_us')->first();
        return view('dashboard.pages.about-us-section')->with('about',$about);
    }
    public function saveAboutUs(Request $request)
    {

    }
    public function updateAboutUs(Request $request, $id)
    {
    }
}
