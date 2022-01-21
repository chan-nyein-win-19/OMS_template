<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OMSControllers\AuthController;
use App\Http\Controllers\OMSControllers\AnnouncementController;
use App\Http\Controllers\OMSControllers\AccountController;


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
    //return view('template.template');
  return view('login.login');
});

//login
Route::post('/checklogin', [App\Http\Controllers\OMSControllers\AuthController::class, 'checklogin']);
Route::get('/logout', [App\Http\Controllers\OMSControllers\AuthController::class, 'logout']);

//Forgot Password

Route::get('/forgotpwd', [App\Http\Controllers\OMSControllers\EmailSendController::class, 'forgotpwd']);
Route::post('/forgotpwd/checkemail', [App\Http\Controllers\OMSControllers\EmailSendController::class, 'checkemail']);
Route::get('/forgotpwd/otpform', [App\Http\Controllers\OMSControllers\EmailSendController::class, 'otpform']);


//One Time Password and Set New Password
Route::post('/otp/checkOTP',[App\Http\Controllers\OMSControllers\ResetPasswordController::class, 'checkOTP']);

// announcement
    Route::resource('announcements',AnnouncementController::class);
// end

// account
    Route::resource('accounts',AccountController::class);
// end

//attendance
Route::get('/attendanceform',[App\Http\Controllers\OMSControllers\AttendanceController::class, 'create']);
Route::post('/attendanceform',[App\Http\Controllers\OMSControllers\AttendanceController::class, 'store']);