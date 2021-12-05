<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FoodController;


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
    return view('login');
});

Route::get('/reg_view ',[App\Http\Controllers\RegisterController::class,'register']);
Route::post('/reg_view',[App\Http\Controllers\RegisterController::class,'store'])->name('create');
Route::post('/log_view',[App\Http\Controllers\LoginController::class,'login'])->name('loginIn');
Route::get('/login',[App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::get('/logout',[App\Http\Controllers\LoginController::class,'logout'])->name('logout');

//Admin
Route::get('/admin_dash',[App\Http\Controllers\AdminController::class,'index'])->name('dashboard');
Route::get('/manage_hostel',[App\Http\Controllers\AdminController::class,'Manage_hostel'])->name('manage_hostel');
Route::get('/hostel_delete/{id}',[App\Http\Controllers\AdminController::class,'hostel_delete'])->name('hostel_delete');

//Hostel
Route::group(['middleware' => 'HostelValid'], function () {
    Route::get('/hostel_dash',[App\Http\Controllers\HostelController::class,'index'])->name('Hostel_dashboard');
    Route::get('/hostel_detail',[App\Http\Controllers\HostelController::class,'Hostel_Detail'])->name('Hostel_details');
    Route::post('/hostel_detail',[App\Http\Controllers\HostelController::class,'Hostel_Detail'])->name('Hostel_details');
    Route::post('/view_detail',[App\Http\Controllers\HostelController::class,'view_Detail'])->name('view_details');
    Route::get('/view_detail',[App\Http\Controllers\HostelController::class,'view_Detail'])->name('view_details');
    Route::get('/edit_detail/{id}',[App\Http\Controllers\HostelController::class,'Edit_Detail'])->name('edit_details');
    Route::post('/edit_detail/{id}',[App\Http\Controllers\HostelController::class,'Edit_Detail'])->name('edit_details');
    Route::put('/update/{id}',[App\Http\Controllers\HostelController::class,'Update_details'])->name('update_details');
    Route::get('/delete/{email}',[App\Http\Controllers\HostelController::class,'Delete_account'])->name('delete');
});

Route::resource('staff', StaffController::class);
Route::resource('food', FoodController::class);

//doctor
Route::get('/doctor_dash',[App\Http\Controllers\DoctorController::class,'index'])->name('Doctor_dashboard');
