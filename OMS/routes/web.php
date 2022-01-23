<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OMSControllers\AuthController;
use App\Http\Controllers\OMSControllers\AnnouncementController;
use App\Http\Controllers\OMSControllers\AccountController;
use App\Http\Controllers\OMSControllers\EmailSendController;
use App\Http\Controllers\OMSControllers\ResetPasswordController;

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
  return view('login.login');
});

// login
    Route::post('/checklogin',[AuthController::class, 'checklogin']);
    Route::get('/logout',[AuthController::class, 'logout']);

// Forgot Password
    Route::get('/forgotpwd',[EmailSendController::class, 'forgotpwd']);
    Route::post('/forgotpwd/checkemail',[EmailSendController::class, 'checkemail']);

// One Time Password and Set New Password
    Route::post('/forgotpwd/checkemail/checkOTP',[ResetPasswordController::class, 'checkOTP']);

// announcement
    Route::resource('announcements',AnnouncementController::class);

    Route::match(['put', 'patch'],'announcements/{id}', 'AnnouncementController@update');
// end

// account
    Route::resource('accounts',AccountController::class);
// end



