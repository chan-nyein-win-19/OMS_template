<?php

use Illuminate\Support\Facades\Route;

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
    return view('template.template');
});


// announcement
    Route::resource('announcements',AnnouncementController::class);
    Route::match(['put', 'patch'],'announcements/{id}', 'AnnouncementController@update');
// end

// account
    Route::resource('accounts',AccountController::class);
// end

