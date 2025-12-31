<?php


use App\Http\Controllers\website\ContactPageController;
use App\Http\Controllers\website\DoctorsPageController;
use App\Http\Controllers\website\HomePageController;
use App\Http\Controllers\website\ServicesPageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

App::setLocale(session('locale', 'en'));

Route::post('/change-language', function (Request $request) {
    if (in_array($request->lang, ['en', 'ar'])) {
        session(['locale' => $request->lang]);
    }
    return back();
})->name('change.language');

/*
|--------------------------------------------------------------------------
| Website routes
|--------------------------------------------------------------------------
*/
//Route::view('/', 'website.pages.home');
//Route::view('/services', 'website.pages.services');
Route::view('/about', 'website.pages.about');

/*
|--------------------------------------------------------------------------
| Dashboard routes (future)
|--------------------------------------------------------------------------
*/
Route::prefix('dashboard')->group(function () {
    // Route::view('/', 'dashboard.pages.dashboard');
});
/**************** Website **********************/
/****** Home *********/

Route::get('/' , [HomePageController::class, 'homeContent']);
Route::get('/services',[ServicesPageController::class, 'listServices']);
Route::get('/contact_us',[ContactPageController::class, 'index'])->name('contact_us');
Route::get('serviceDetails/{slug}' , [ServicesPageController::class, 'serviceDetails']);
Route::get('doctors' , [DoctorsPageController::class, 'listDoctors']);
Route::get('doctorDetails/{id}' , [DoctorsPageController::class, 'doctorDetails']);


//Route::get('listServices' , [HomePageController::class, 'listServices']);
//Route::get('listReviews' , [HomePageController::class, 'listReviews']);


/**************** End Website **********************/






/************************* Test lamiaa *********************/
Route::prefix('test')->group(function () {
    Route::get('listDoctors' , [HomePageController::class, 'listDoctors']);
    Route::get('listServices' , [HomePageController::class, 'listServices']);
    Route::get('listReviews' , [HomePageController::class, 'listReviews']);
    Route::get('serviceDetails/{slug}' , [ServicesPageController::class, 'serviceDetails']);
    Route::get('listDoctors' , [DoctorsPageController::class, 'listDoctors']);
    Route::get('doctorDetails/{id}' , [DoctorsPageController::class, 'doctorDetails']);
    Route::post('storeRequest' , [ContactPageController::class, 'StoreRequest']);
});
/************************* End Test *********************/



