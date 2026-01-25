<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{

    public function index(){
        return view('dashboard.**********');
    }
    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            return redirect()->back()->with('success' , 'operation completed successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error' , 'operation failed');
        }
    }
    public function clearConfig()
    {
        try {
            Artisan::call('config:clear');
            return redirect()->back()->with('success' , 'operation completed successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error' , 'operation failed');
        }
    }
    public function runSeeder(){
        try {
            Artisan::call('db:seed');
            return redirect()->back()->with('success' , 'operation completed successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error' , 'operation failed');
        }
    }
    public function clearRoute(){
        try {
            Artisan::call('route:clear');
            return redirect()->back()->with('success' , 'operation completed successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error' , 'operation failed');
        }
    }
    public function clearView(){
        try {
            Artisan::call('view:clear');
            return redirect()->back()->with('success' , 'operation completed successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error' , 'operation failed');
        }
    }
    public function clearOptimize(){
        try {
            Artisan::call('optimize:clear');
            return redirect()->back()->with('success' , 'operation completed successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error' , 'operation failed');
        }
    }
}
