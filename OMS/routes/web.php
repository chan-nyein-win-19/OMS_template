<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OMSControllers\AnnouncementController;
use App\Http\Controllers\OMSControllers\AccountController;
use App\Models\Announcement;

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

//login
Route::post('/checklogin', [App\Http\Controllers\OMSControllers\AuthController::class, 'checklogin']);
Route::get('/successlogin', [App\Http\Controllers\OMSControllers\AuthController::class, 'successlogin']);
Route::get('/logout', [App\Http\Controllers\OMSControllers\AuthController::class, 'logout']);

// announcement
    Route::resource('announcements',AnnouncementController::class);
// end

// account
    Route::resource('accounts',AccountController::class);
// end

