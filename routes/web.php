<?php


use App\Http\Controllers\dashboard\AuthController;
use App\Http\Controllers\dashboard\BookingController;
use App\Http\Controllers\dashboard\DoctorController;
use App\Http\Controllers\dashboard\PermissionsController;
use App\Http\Controllers\dashboard\RolesController;
use App\Http\Controllers\dashboard\SettingsController;
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
    Route::get('admin-add' , [AuthController::class, 'addAdmin'])->middleware(['permission:create_admin'])->name('addAdmins');
    Route::get('toggleAdmin/{id}' , [AuthController::class, 'toggleAdminStatus'])->middleware(['permission:update_admin'])->name('admin.toggle');
    Route::get('deleteAdmin/{id}' , [AuthController::class, 'deleteAdmin'])->middleware(['permission:update_admin'])->name('admin.delete');
    Route::post('storeAdmins' , [AuthController::class, 'createOrEditAdmin'])->middleware(['permission:create_admin'])->name('store-admin');
    Route::post('UpdateAdmins/{id}' , [AuthController::class, 'createOrEditAdmin'])->middleware(['permission:update_admin'])->name('Update-admin');
    Route::get('admin-edit/{id}' , [AuthController::class, 'editAdmin'])->middleware(['permission:update_admin'])->name('Edit-admin');;

    /*** Roles ***/
    Route::get('role-list' , [RolesController::class, 'listRoles'])->middleware(['permission:read_role'])->name('roles-list');
    Route::get('role/{id}' , [RolesController::class, 'roleDetails'])->middleware(['permission:read_role'])->name('roles-details');
    Route::get('role-add' , [RolesController::class, 'addRole'])->middleware(['permission:create_role'])->name('roles-add');
    Route::post('storeRole' , [RolesController::class, 'storeRole'])->middleware(['permission:create_role'])->name('store-role');
    Route::get('role-edit/{id}' , [RolesController::class, 'editRole'])->middleware(['permission:update_role'])->name('edit-role');
    Route::post('updateRole/{id}' , [RolesController::class, 'storeRole'])->middleware(['permission:update_role'])->name('update-role');;


    /*** Doctors ***/
    Route::get('doctors-list' , [DoctorController::class, 'listDoctors'])->middleware(['permission:read_doctor'])->name('doctors-list');
    Route::post('storeDoctor' , [DoctorController::class, 'storeDoctor'])->middleware(['permission:create_doctor'])->name('store-doctor');
    Route::get('doctors-list/add' , [DoctorController::class, 'addDoctor'])->middleware(['permission:create_doctor'])->name('doctors-add');
    Route::get('doctors-list/view/{id}' , [DoctorController::class, 'viewDoctor'])->middleware(['permission:read_doctor'])->name('doctors-view');
    Route::get('toggleDoctor/{id}' , [DoctorController::class, 'toggleDoctorStatus'])->middleware(['permission:update_admin'])->name('doctor.toggle');
    Route::get('doctors-edit' , [DoctorController::class, 'updateDoctor'])->middleware(['permission:update_doctor'])->name('doctors-add');

    /*** Doctor Media ***/
    Route::get('doctors-list-media' , [DoctorController::class, 'listDoctorMediaCount'])->middleware(['permission:read_doctor_media'])->name('doctors-list-media');
    Route::get('doctors-list-media/{id?}' , [DoctorController::class, 'listDoctorMedia'])->middleware(['permission:read_doctor_media'])->name('doctors-mediaList');
    Route::get('doctors-list-media-add/{id?}' , [DoctorController::class, 'addDoctorMedia'])->middleware(['permission:create_doctor_media'])->name('doctors-addMedia');
    Route::post('storeDoctorMedia' , [DoctorController::class, 'storeDoctorMedia'])->middleware(['permission:create_doctor_media'])->name('createOrEditDoctorMedia');
    Route::get('toggleMediaStatus/{id}' , [DoctorController::class, 'toggleMediaStatus'])->middleware(['permission:update_doctor_media'])->name('toggleMediaStatus');
    Route::get('deleteDoctorMedia/{id}' , [DoctorController::class, 'deleteDoctorMedia'])->middleware(['permission:delete_doctor_media'])->name('deleteDoctorMedia');


    /*** Settings ***/
    Route::get('setting' , [SettingsController::class, 'setting'])->middleware(['permission:read_settings'])->name('setting');
    Route::post('setSetting' , [SettingsController::class, 'setSetting'])->middleware(['permission:update_settings'])->name('set-setting');

    /*** Booking Requests ***/
    Route::get('booking-requests' ,[BookingController::class, 'listBookingRequests'])->middleware(['permission:read_booking_request'])->name('booking-requests');
    Route::get('booking-services' ,[BookingController::class, 'listBookingRequests'])->middleware(['permission:read_booking_service'])->name('booking-services');
    Route::get('toggleBookingServicesStatus/{id}' ,[BookingController::class, 'toggleBookingServicesStatus'])->middleware(['permission:update_booking_service'])->name('toggleBookingServicesStatus');
    Route::get('createOrUpdateService/{id?}' ,[BookingController::class, 'createOrUpdateService'])->middleware(['permission:update_booking_service'])->name('createOrUpdateService');

    /*** Services ***/
    /*** Booking Services ***/

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
    Route::get('doctors-view/{id}' , [DoctorController::class, 'viewDoctor']);
    Route::get('toggleDoctor/{id}' , [DoctorController::class, 'toggleDoctorStatus'])->name('admin.toggle');
    Route::get('deleteDoctor/{id}' , [DoctorController::class, 'deleteDoctor'])->name('admin.toggle');
    Route::get('addDoctorMedia/{id?}' , [DoctorController::class, 'addDoctorMedia']);
    Route::get('listDoctorMediaCount' , [DoctorController::class, 'listDoctorMedia']);
    Route::get('listDoctorMedia/{id}' , [DoctorController::class, 'listDoctorMedia']);
    Route::get('role/{id}' , [RolesController::class, 'roleDetails']);
    Route::get('role-edit/{id}' , [RolesController::class, 'editRole']);
    Route::get('role-add' , [RolesController::class, 'addRole']);


    Route::post('storeRole' , [RolesController::class, 'storeRole']);
    Route::post('updateRole/{id}' , [RolesController::class, 'storeRole']);

    Route::get('setting' , [SettingsController::class, 'setting']);
    Route::post('setSetting' , [SettingsController::class, 'setSetting']);

    Route::post('createOrUpdateService/{id?}' , [BookingController::class, 'createOrUpdateService']);
});
/************************* End Test *********************/



