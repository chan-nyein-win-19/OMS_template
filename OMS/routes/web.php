<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OMSControllers\AnnouncementController;
use App\Http\Controllers\OMSControllers\AccountController;
use App\Http\Controllers\OMSControllers\LeaveController;
use App\Http\Controllers\OMSControllers\LeaderLeaveController;
use App\Http\Controllers\OMSControllers\AdminController;

use App\Http\Controllers\AttendanceController;

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

// Route::get('/', function () {
//     return view('template.template');
// });
//Auth Route
Route::get('/', [AdminController::class, 'index']);
Route::post('/adminlogin/checklogin',[AdminController::class, 'checklogin']);
//End Auth

// announcement
    Route::resource('announcements',AnnouncementController::class);
// end

// account
    Route::resource('accounts',AccountController::class);
// end

//Leave Resource Route
    Route::get('leaves/list',[
        'as'=>'leaves.show',
        'uses'=>'App\Http\Controllers\OMSControllers\LeaveController@show'
    ]);
    Route::get('leaves/edit/{date}',[
        'as'=>'leaves.edit',
        'uses'=>'App\Http\Controllers\OMSControllers\LeaveController@edit'
    ]);
    Route::resource('leaves',LeaveController::class,['except'=>'show','edit']);
//end Resource Route
//login
Route::get('adminlogin/successlogin',[AdminController::class, 'successlogin'])->middleware('auth');
Route::get('/adminlogin/logout', [AdminController::class, 'logout']);
//endlogin


//EmployeeLeave
Route::get('/leaveRequestForm/{newLeave}/{date}',[LeaveController::class,'addNew']);
//Route::post('/leaveRequestForm/{newLeave}/{date}',[LeaveController::class,'save']);
Route::post('/leaveRecord/searchLeave',[LeaveController::class,'searchLeave']);
//Route::get('/leaveRequestForm',[LeaveController::class,'show']);
//Route::post('/leaveRequestForm',[LeaveController::class,'save']);
//Route::get('/leaveRecord',[LeaveController::class,'list']);

//Route::get('/leaveRecord/edit/{date}',[LeaveController::class,'editLeave']);
//Route::post('/leaveRecord/edit',[LeaveController::class,'editLeavePost']);
//Route::get('/leaveRecord/delete/{id}',[LeaveController::class,'destroy']);

//EndEmployeeLeave

//leaderLeave
Route::get('/leader/leaveRecord',[LeaderLeaveController::class,'viewLeave']);
Route::post('/leader/leaveRecord/searchLeave',[LeaderLeaveController::class,'findLeave']);
Route::get('/leader/leaveStatus/{id}/{status}/{date}/{filtering}',[LeaderLeaveController::class,'changeStatus']);
Route::get('/leader/leaveRecord/filterLeave/{filtering}/{date}',[LeaderLeaveController::class,'filterLeave']);
//endLeaderLeave
