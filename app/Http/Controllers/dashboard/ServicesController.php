<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function servicesList(Request $request)
    {
        $query = DB::table('services')
        ->whereNull('deleted_at')
        ->select('name_en' , 'name_ar' , 'icon' , 'status' , 'id');






        $services = $query->paginate(10);
        return view('dashboard.***********' , compact('services'));



    }
    public function addServices(Request $request){

        return view('dashboard.********');
    }
    public function serviceDetails(Request $request){

        return view('dashboard.********');
    }
    public function editServices(Request $request){

        return view('dashboard.********');
    }
    public function createOrEditService(Request $request , $id = null){
        return view('dashboard.********');
    }
    public function toggleServicesStatus($id)
    {
        $service = DB::table('services')->where('id', $id);
        $currentStatus = $service->value('status');
        $newStatus = $currentStatus == 1 ? 0 : 1;
        $service->update(['status' => $newStatus]);
        return redirect()->route('********');
    }


}
