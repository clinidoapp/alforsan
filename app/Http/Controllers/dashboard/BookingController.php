<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function listBookingRequests(Request $request){

        $query = DB::table('book_requests')
            ->join('booking_services','book_requests.service_id','=','booking_services.id')
            ->select(
            'book_requests.name','book_requests.email',
            'book_requests.phone' ,'book_requests.id',
            'booking_services.name_en as service_name');


        if ($request->filled('patient_name')) {
            $query->where('book_requests.name', 'like', '%' . $request->patient_name . '%');
        }
        if ($request->filled('patient_id')) {
            $query->where('book_requests.id', $request->patient_id);
        }
        if ($request->filled('patient_phone')) {
            $query->where('book_requests.phone', $request->patient_phone);
        }

        $BookRequests = $query->paginate(10);

        return view('*************', compact('BookRequests'));

    }
}
