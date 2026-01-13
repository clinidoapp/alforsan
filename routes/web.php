<?php


use App\Http\Controllers\dashboard\AuthController;
use App\Http\Controllers\dashboard\DoctorController;
use App\Http\Controllers\dashboard\PermissionsController;
use App\Http\Controllers\dashboard\RolesController;
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

Route::get('admin/login' , [AuthController::class, 'index']);
Route::post('admin/login-user' , [AuthController::class, 'login'])->name('login');

Route::middleware([AuthMiddleware::class])->prefix('admin')->group(function () {

    /*** Dashboard ***/
    Route::get('dashboard' , function ()
    {
        return view('dashboard.pages.home');
    })->name('dashboard');

    /*** Auth ***/
    Route::post('logout' , [AuthController::class, 'logout'])->name('logout');

    /*** Admins ***/
    Route::get('admin-list' , [AuthController::class, 'listAdmins'])->middleware(['permission:read_admin'])->name('admin-list');
    Route::get('add-admin' , [AuthController::class, 'addAdmin'])->middleware(['permission:create_admin'])->name('addAdmins');
    Route::get('toggleAdmin/{id}' , [AuthController::class, 'toggleAdminStatus'])->middleware(['permission:update_admin'])->name('admin.toggle');
    Route::get('deleteAdmin/{id}' , [AuthController::class, 'deleteAdmin'])->middleware(['permission:update_admin'])->name('admin.delete');
    Route::post('storeAdmins' , [AuthController::class, 'createOrEditAdmin'])->middleware(['permission:create_admin'])->name('store-admin');
    Route::post('UpdateAdmins/{id}' , [AuthController::class, 'createOrEditAdmin'])->middleware(['permission:update_admin'])->name('Update-admin');
    Route::get('editAdmins/{id}' , [AuthController::class, 'editAdmin'])->middleware(['permission:update_admin'])->name('Edit-admin');;
    /*** Doctors ***/
    Route::get('roles' , [RolesController::class, 'listRoles'])->middleware(['permission:read_roles'])->name('roles-list');

    /*** Doctors ***/
    Route::get('listDoctors' , [DoctorController::class, 'listDoctors'])->middleware(['permission:read_doctor']);
    Route::post('storeDoctor' , [DoctorController::class, 'storeDoctor'])->middleware(['permission:create_doctor']);


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


    Route::get('permissions' , [PermissionsController::class, 'index']);
    Route::get('roles' , [RolesController::class, 'listRoles']);
    Route::get('admins' , [AuthController::class, 'listAdmins']);
    Route::get('toggleAdminStatus/{id}' , [AuthController::class, 'toggleAdminStatus']);
    Route::get('deleteAdmin/{id}' , [AuthController::class, 'deleteAdmin']);
    Route::post('storeAdmins' , [AuthController::class, 'storeAdmins']);
    Route::get('editAdmins/{id}' , [AuthController::class, 'editAdmins']);





});
/************************* End Test *********************/



