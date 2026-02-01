<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    public function listBookingRequests(Request $request){

        $query = DB::table('book_requests')
            ->join('booking_services','book_requests.service_id','=','booking_services.id')
            ->select(
            'book_requests.name','book_requests.email',
            'book_requests.phone' ,'book_requests.id',
            'booking_services.name_en as service_name',
            'book_requests.created_at')->orderBy('book_requests.id','DESC');


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
            $query->where('book_requests.phone','like' , '%' .  $request->patient_phone . '%');
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
    public function bookingServicesList(Request $request){

        $query = DB::table('booking_services')
            ->select('id' , 'name_en' , 'name_ar' , 'status');

        if ($request->filled('service_id')) {
            $query->where('id', $request->service_id);
        }

        if ($request->filled('service_name')) {
            $search = trim($request->service_name);
            $search = str_replace(['أ','إ','آ'], 'ا', $search);
            $search = str_replace(['ى','ي'], 'ي', $search);
            $search = str_replace('ة', 'ه', $search);
            $query->where( function ($q) use ($search) {
                $q->where('name_en', 'like', '%' . $search . '%')
                    ->orWhereRaw("
        REPLACE(
          REPLACE(
            REPLACE(
              REPLACE(
                REPLACE(name_ar,'أ','ا'),
              'إ','ا'),
            'آ','ا'),
          'ى','ي'),
        'ة','ه')
        LIKE ?
      ", ["%{$search}%"]);
            });
        }

        $services = $query->paginate(10);
        $search = [
            'service_id' => $request->service_id ?? null,
            'service_name' => $request->service_name ?? null,
        ];
        return view('dashboard.pages.services.bookingServices', compact('search' , 'services'));
    }
    public function toggleBookingServicesStatus($id)
    {
        $service = DB::table('booking_services')->where('id', $id);
        $currentStatus = $service->value('status');
        $newStatus = $currentStatus == 1 ? 0 : 1;
        $service->update(['status' => $newStatus]);
        return redirect()->back()->with('success', 'Service status Updated successfully');
    }
    public function createOrUpdateService(Request $request , $id = null){

        $data = $request->validate([
            'name_ar' => ['required', 'string', 'max:191',
                Rule::unique('booking_services', 'name_ar')->ignore($id ,'id')
            ],
            'name_en' => ['required', 'string', 'max:191',
                Rule::unique('booking_services', 'name_en')->ignore($id , 'id'),
            ],
        ]);

        if (!$id) {
            DB::table('booking_services')->insert([
                'name_ar' => $data['name_ar'],
                'name_en' => $data['name_en'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }else {
            DB::table('booking_services')->where('id', $id)->update([
                'name_ar' => $data['name_ar'],
                'name_en' => $data['name_en'],
                'updated_at' => now(),
            ]);
        }
        return redirect()->back()->with('success', $id ? 'Service updated successfully' : 'Service added successfully');

    }

}
