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
            'booking_services.name_en as service_name',
            'book_requests.created_at');


        if ($request->filled('patient_name')) {
            $query->where('book_requests.name', 'like', '%' . $request->patient_name . '%');
        }
        if ($request->filled('request_id')) {
            $query->where('book_requests.id', $request->request_id);
        }
        if ($request->filled('service_id')) {
            $query->where('booking_services.id', $request->service_id);
        }
        if ($request->filled('patient_phone')) {
            $query->where('book_requests.phone', $request->patient_phone);
        }


        $BookRequests = $query->paginate(10);
        $bookingServices = DB::table('booking_services')->select('id' , 'name_en as service_name')->get();

        $search = [
            'request_id' => $request->request_id ?? null,
            'patient_phone' => $request->patient_phone ?? null,
            'patient_name' => $request->patient_name ?? null,
            'service_id' => $request->service_id ?? null,

        ];
        return view('dashboard.pages.bookings.list', compact('BookRequests' , 'search' , 'bookingServices'));

    }
}
