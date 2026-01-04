<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\Doctors\StoreDoctorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function listDoctors(Request $request){

        $query= DB::table('doctors')
            ->where('status', 1)
            ->where('is_deleted', 0)
            //TODO SELECT
            ->select('id','name_en' , 'name_ar' , 'image' ,'academic_title_ar','academic_title_en',
                'main_speciality_en' , 'main_speciality_ar');


        if ($request->filled('doctor_name')) {
            $search = trim($request->doctor_name);
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
        $doctors =    $query->paginate(10);
        return view('********', compact('doctors'));

    }

    public function addDoctor(Request $request){

        return view('********');
    }
    public function storeDoctor(StoreDoctorRequest $request){

        $data = $request->validated();
        dd($data);

        return view('********');
    }







}
