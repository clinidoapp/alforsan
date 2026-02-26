<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\Pages\UpdateAboutUsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function getAboutUs(){
        $about = DB::table('about_us')->first();
        return view('dashboard.pages.about-us-section')->with('about',$about);
    }
    public function updateAboutUsPage(UpdateAboutUsRequest $request){

        $data = $request->validated();
        $about = DB::table('about_us')->first();
        DB::table('about_us')
            ->where('id', $about->id)
            ->update([

                'mission_en' => $data['mission_en'],
                'mission_ar' => $data['mission_ar'],

                'vision_en' => $data['vision_en'],
                'vision_ar' => $data['vision_ar'],

                'our_story_en' => $data['our_story_en'],
                'our_story_ar' => $data['our_story_ar'],

                'recovery_count' => $data['recovery_count'],
                'doctors_count' => $data['doctors_count'],
                'experience_years' => $data['experience_years'],

                'value1_title_en' => $data['value1_title_en'],
                'value1_title_ar' => $data['value1_title_ar'],
                'value1_desc_en' => $data['value1_desc_en'],
                'value1_desc_ar' => $data['value1_desc_ar'],

                'value2_title_en' => $data['value2_title_en'],
                'value2_title_ar' => $data['value2_title_ar'],
                'value2_desc_en' => $data['value2_desc_en'],
                'value2_desc_ar' => $data['value2_desc_ar'],

                'value3_title_en' => $data['value3_title_en'],
                'value3_title_ar' => $data['value3_title_ar'],
                'value3_desc_en' => $data['value3_desc_en'],
                'value3_desc_ar' => $data['value3_desc_ar'],

                'value4_title_en' => $data['value4_title_en'],
                'value4_title_ar' => $data['value4_title_ar'],
                'value4_desc_en' => $data['value4_desc_en'],
                'value4_desc_ar' => $data['value4_desc_ar'],

                'value5_title_en' => $data['value5_title_en'],
                'value5_title_ar' => $data['value5_title_ar'],
                'value5_desc_en' => $data['value5_desc_en'],
                'value5_desc_ar' => $data['value5_desc_ar'],

                'updated_at' => now(),
            ]);
        return redirect()->route('about-us');
    }

}
