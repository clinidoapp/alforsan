<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesPageController extends Controller
{

    public function listServices(){

        $services = DB::table('services')
            ->where('status', 1)
            ->select('id','name_en' , 'name_ar' , 'icon')
            ->whereNotNull('icon')
            ->get();
        return view('website.pages.services', compact('services'));

    }





}
