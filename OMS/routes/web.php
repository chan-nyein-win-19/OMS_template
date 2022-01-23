<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OMSControllers\AuthController;
use App\Http\Controllers\OMSControllers\AnnouncementController;
use App\Http\Controllers\OMSControllers\AccountController;
use App\Http\Controllers\OMSControllers\EmailSendController;
use App\Http\Controllers\OMSControllers\ResetPasswordController;
use App\Http\Controllers\OMSControllers\EmployeeController;
use App\Http\Controllers\OMSControllers\UserController;

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
// end

// Forgot Password
    Route::get('/forgotpwd',[EmailSendController::class, 'forgotpwd']);

    Route::post('/forgotpwd/checkemail',[EmailSendController::class, 'checkemail']);
// end

// One Time Password and Set New Password
    Route::post('/forgotpwd/checkemail/checkOTP',[ResetPasswordController::class, 'checkOTP']);
// end


// announcement
    Route::resource('announcements',AnnouncementController::class);

    Route::match(['put', 'patch'],'announcements/{id}', 'AnnouncementController@update');
// end

// account
    Route::resource('accounts',AccountController::class);
    Route::get('/changepassword/{id}',[AccountController::class,'editPassword']);
    Route::post('/changepassword/{id}',[AccountController::class,'changePassword']);
// end


// user
    Route::resource(name: 'user', controller:EmployeeController::class);
    Route::resource('users',UserController::class);
// end

