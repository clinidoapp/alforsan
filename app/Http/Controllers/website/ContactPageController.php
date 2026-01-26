<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\BookRequest\StoreBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactPageController extends Controller
{
    public function index(){

        $services = DB::table('booking_services')->where('status', 1)
            ->select('id' , 'name_en' , 'name_ar')
            ->get();
        return view('website.pages.contact' ,  compact('services'));
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
        $service = DB::table('booking_services')->where('id' , '=' , $data['service_id'])
        ->select("id" , 'name_en' , 'name_ar')->
        first();

        $response = [
            'patient_name' => $data['full_name'],
            'patient_email' => $data['email'],
            'patient_phone' => $data['phone'],
            'service_name_en' => $service->name_en,
            'service_name_ar' => $service->name_ar,
            'patient_notes' =>$data['notes']
        ];

        Mail::send('************', ['data' => $data], function ($mail) use ($response) {
            $mail->to(env('MAIL_FROM_ADDRESS'))
                ->subject("New Booking Request");
        });


        return view('website.pages.thank-you' ,  compact('response'));
    }
}
