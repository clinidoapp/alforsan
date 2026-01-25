<?php


use App\Http\Controllers\dashboard\ArtisanController;
use App\Http\Controllers\dashboard\AuthController;
use App\Http\Controllers\dashboard\BookingController;
use App\Http\Controllers\dashboard\DoctorController;
use App\Http\Controllers\dashboard\PermissionsController;
use App\Http\Controllers\dashboard\RolesController;
use App\Http\Controllers\dashboard\ServicesController;
use App\Http\Controllers\dashboard\SettingsController;
use App\Http\Controllers\website\ContactPageController;
use App\Http\Controllers\website\DoctorsPageController;
use App\Http\Controllers\website\HomePageController;
use App\Http\Controllers\website\ServicesPageController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\DB;
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
        $doctor_count = DB::table('doctors')->where('is_deleted' , 0)
            ->whereNull('deleted_at')
            ->count();
        $services_count = DB::table('services')->whereNull('deleted_at')->count();
        $bookings_count = DB::table('book_requests')->whereNull('deleted_at')->count();

        return view('dashboard.pages.home' , compact('doctor_count' ,'services_count' , 'bookings_count'));
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
    Route::post('storeDoctor/{id?}' , [DoctorController::class, 'storeDoctor'])->middleware(['permission:create_doctor'])->name('store-doctor');
    Route::get('doctors-list/add' , [DoctorController::class, 'addDoctor'])->middleware(['permission:create_doctor'])->name('doctors-add');
    Route::get('doctors-list/view/{id}' , [DoctorController::class, 'viewDoctor'])->middleware(['permission:read_doctor'])->name('doctors-view');
    Route::get('toggleDoctor/{id}' , [DoctorController::class, 'toggleDoctorStatus'])->middleware(['permission:update_admin'])->name('doctor.toggle');
    Route::get('doctors-edit/{id}' , [DoctorController::class, 'updateDoctor'])->middleware(['permission:update_doctor'])->name('doctors-edit');

    /*** Doctor Media ***/
    Route::get('doctors-list-media' , [DoctorController::class, 'listDoctorMediaCount'])->middleware(['permission:read_doctor_media'])->name('doctors-list-media');
    Route::get('doctors-list-media/{id?}' , [DoctorController::class, 'listDoctorMedia'])->middleware(['permission:read_doctor_media'])->name('doctors-mediaList');
    Route::get('doctors-list-media-add/{id?}' , [DoctorController::class, 'addDoctorMedia'])->middleware(['permission:create_doctor_media'])->name('doctors-addMedia');
    Route::post('storeDoctorMedia' , [DoctorController::class, 'storeDoctorMedia'])->middleware(['permission:create_doctor_media'])->name('createOrEditDoctorMedia');
    Route::post('UpdateDoctorMedia' , [DoctorController::class, 'UpdateDoctorMedia'])->middleware(['permission:update_doctor_media'])->name('UpdateDoctorMedia');
    Route::get('toggleMediaStatus/{id}' , [DoctorController::class, 'toggleMediaStatus'])->middleware(['permission:update_doctor_media'])->name('toggleMediaStatus');
    Route::get('deleteDoctorMedia/{id}' , [DoctorController::class, 'deleteDoctorMedia'])->middleware(['permission:delete_doctor_media'])->name('deleteDoctorMedia');

    /*** Settings ***/
    Route::get('setting' , [SettingsController::class, 'setting'])->middleware(['permission:read_settings'])->name('setting');
    Route::post('setSetting' , [SettingsController::class, 'setSetting'])->middleware(['permission:update_settings'])->name('set-setting');

    /*** Booking Requests ***/
    Route::get('booking-requests' ,[BookingController::class, 'listBookingRequests'])->middleware(['permission:read_booking_request'])->name('booking-requests');

    /*** Services ***/
    Route::get('services-list' , [ServicesController::class, 'servicesList'])->middleware(['permission:read_service'])->name('service-list');
    Route::get('services-add' , [ServicesController::class, 'addServices'])->middleware(['permission:create_service'])->name('service-add');
    Route::get('services-edit/{id}' , [ServicesController::class, 'editServices'])->middleware(['permission:update_service'])->name('store-service');
    Route::get('services-details/{id}' , [ServicesController::class, 'serviceDetails'])->middleware(['permission:update_service'])->name('view-service');
    Route::post('storeService/{id?}' , [ServicesController::class, 'createOrEditService'])->middleware(['permission:create_service'])->name('add-service');
    Route::get('toggleServicesStatus/{id}' , [ServicesController::class, 'toggleServicesStatus'])->middleware(['permission:update_service'])->name('toggleServiceStatus');

    /*** Booking Services ***/
    Route::get('booking-services' ,[BookingController::class, 'bookingServicesList'])->middleware(['permission:read_booking_service'])->name('booking-services');
    Route::get('toggleBookingServicesStatus/{id}' ,[BookingController::class, 'toggleBookingServicesStatus'])->middleware(['permission:update_booking_service'])->name('toggleBookingServicesStatus');
    Route::post('createOrUpdateBookingService/{id?}' ,[BookingController::class, 'createOrUpdateService'])->middleware(['permission:update_booking_service'])->name('createOrUpdateBookingService');

    /*** Developers ***/
    Route::get('developer' , [ArtisanController::class, 'index'])->middleware(['permission:view_page'])->name('developer');
    Route::get('clearCache' , [ArtisanController::class, 'clearCache'])->middleware(['permission:clear_cache'])->name('clearCache');
    Route::get('runSeeder' , [ArtisanController::class, 'runSeeder'])->middleware(['permission:run_seeder'])->name('runSeeder');
    Route::get('clearView' , [ArtisanController::class, 'clearView'])->middleware(['permission:clear_view'])->name('clearView');
    Route::get('clearConfig' , [ArtisanController::class, 'clearConfig'])->middleware(['permission:clear_config'])->name('clearConfig');
    Route::get('clearRoute' , [ArtisanController::class, 'clearRoute'])->middleware(['permission:clear_route'])->name('clearRoute');
    Route::get('clearOptimize' , [ArtisanController::class, 'clearOptimize'])->middleware(['permission:clear_optimize'])->name('clearOptimize');

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
    Route::get('services-details/{id}' , [ServicesController::class, 'serviceDetails']);

    Route::post('createOrUpdateService/{id?}' , [BookingController::class, 'createOrUpdateService']);

    Route::get('clearCache' , [ArtisanController::class, 'clearCache']);
    Route::get('runSeeder' , [ArtisanController::class, 'runSeeder']);
    Route::get('clearView' , [ArtisanController::class, 'clearView']);
    Route::get('clearConfig' , [ArtisanController::class, 'clearConfig']);
    Route::get('clearRoute' , [ArtisanController::class, 'clearRoute']);
    Route::get('clearOptimize' , [ArtisanController::class, 'clearOptimize']);
});
/************************* End Test *********************/



