<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\BookRequest\StoreBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactPageController extends Controller
{
    public function index(){

        $services = DB::table('services')
            ->select('id' , 'name_en' , 'name_ar')
            ->get();

        return view('website.contact' ,  compact('services'));
    }

    public function StoreRequest(StoreBookRequest $request){

        $data = $request->validated();
        DB::table('book_requests')->insert([
            'name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'service_id' => $data['service_id'],
            'notes' => $data['notes'],
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('contact_us');





    }
}
