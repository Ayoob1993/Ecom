<?php

use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::controller(AdminController::class)->group(function(){

    Route::match(['get','post'],'adminLogin','login');
    Route::group(['middleware'=>['admin']],function(){

        //Route Admin Dasboard
        Route::get('adminDashboard','dashboard');

        //Route Admin Password
        Route::match(['get','post'],'update_admin_password','updateAdminPassword');

        //Route Check Admin Password
        Route::post('check_admin_password','checkAdminPassword');

        //Route Admin Detais
        Route::match(['get','post'],'update_admin_details','updateAdminDetails');

        //Route Update Admin Details
        Route::match(['get','post'],'update_vendor_details/{slug}','updateVendorDetails');

        //RouteAdmin Login
        Route::get('adminLogout','logout');
    });

});



