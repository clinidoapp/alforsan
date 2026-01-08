<?php


use App\Http\Controllers\dashboard\AuthController;
use App\Http\Controllers\dashboard\DoctorController;
use App\Http\Controllers\website\ContactPageController;
use App\Http\Controllers\website\DoctorsPageController;
use App\Http\Controllers\website\HomePageController;
use App\Http\Controllers\website\ServicesPageController;
use App\Http\Middleware\AuthMiddleware;
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
Route::get('/contact',[ContactPageController::class, 'index'])->name('contact_us');
Route::get('services/{slug}' , [ServicesPageController::class, 'serviceDetails'])->name('serviceDetails');
Route::get('doctors' , [DoctorsPageController::class, 'listDoctors']);
Route::get('doctors/details/{id}' , [DoctorsPageController::class, 'doctorDetails'])->name('doctorDetails');
Route::post('thank_you' , [ContactPageController::class, 'StoreRequest'])->name('StoreRequest');

/**************** End Website **********************/
/**************** Dashboard **********************/
Route::get('listDoctors' , [DoctorController::class, 'listDoctors'])->middleware(['permission:xxxxxxxxx']);


Route::middleware([AuthMiddleware::class])->prefix('dashboard')->group(function () {

    /*** Auth ***/
    // Route::view('/', 'dashboard.pages.dashboard');



    /*** Doctors ***/
    Route::get('listDoctors' , [DoctorController::class, 'listDoctors']);
    Route::post('storeDoctor' , [DoctorController::class, 'storeDoctor']);


});

/**************** End Dashboard **********************/
/************************* Test lamiaa *********************/
Route::prefix('test')->group(function () {
    Route::get('listDoctors' , [HomePageController::class, 'listDoctors']);
    Route::get('listServices' , [HomePageController::class, 'listServices']);
    Route::get('listReviews' , [HomePageController::class, 'listReviews']);
    Route::get('serviceDetails/{slug}' , [ServicesPageController::class, 'serviceDetails']);
    Route::get('listDoctors' , [DoctorsPageController::class, 'listDoctors']);
    Route::get('doctorDetails/{id}' , [DoctorsPageController::class, 'doctorDetails']);
    Route::post('storeRequest' , [ContactPageController::class, 'StoreRequest']);
    Route::post('storeDoctor' , [DoctorController::class, 'storeDoctor']);
    Route::post('login' , [AuthController::class, 'login']);

});
/************************* End Test *********************/



