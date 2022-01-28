<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OMSControllers\AuthController;
use App\Http\Controllers\OMSControllers\AnnouncementController;
use App\Http\Controllers\OMSControllers\AccountController;
use App\Http\Controllers\OMSControllers\EmailSendController;
use App\Http\Controllers\OMSControllers\ResetPasswordController;
use App\Http\Controllers\OMSControllers\EmployeeController;
use App\Http\Controllers\OMSControllers\UserController;
use App\Http\Controllers\OMSControllers\LeaveController;
use App\Http\Controllers\OMSControllers\LeaderLeaveController;
use App\Http\Controllers\OMSControllers\AttendanceController;

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
    Route::get('login',['as'=>'login','uses'=>function(){
        return view('login.login');
    }]);

    Route::get('/', function () {
        return view('login.login');
    });

// login
    Route::post('/checklogin',[AuthController::class, 'checklogin']);
    Route::get('/successlogin',[AuthController::class, 'successlogin']);
    Route::get('/logout',[AuthController::class, 'logout']);
// end

// Forgot Password
    Route::get('/forgotpwd',[EmailSendController::class, 'forgotpwd']);
    Route::post('/forgotpwd/checkemail',[EmailSendController::class, 'checkemail']);
// end

// One Time Password and Set New Password
    Route::get('/forgotpwd/checkemail/checkOTP',[AuthController::class, 'login']);
    Route::post('/forgotpwd/checkemail/checkOTP',[ResetPasswordController::class, 'checkOTP']);
// end

//Middleware Function
    Route::middleware(['auth'])->group(function(){
    
    //user
    Route::resource('users',UserController::class);
    Route::resource(name: 'user', controller:EmployeeController::class);
    // end

    //announcement
    Route::resource('announcements',AnnouncementController::class);
    // end

    //account
    Route::resource('accounts',AccountController::class);
    Route::get('/changepassword/{id}',[AccountController::class,'editPassword']);
    // end

    //attendance
    Route::get('/attendanceform',[AttendanceController::class, 'create']);
    Route::get('/attendanceList',[AttendanceController::class,'index']);
    Route::get('/edit/{id}',[AttendanceController::class,'edit']);
    // end

    // leave 
    Route::get('leaves/list',[
        'as'=>'leaves.show',
        'uses'=>'App\Http\Controllers\OMSControllers\LeaveController@show'
    ]);
    Route::get('leaves/edit/{date}',[
        'as'=>'leaves.edit',
        'uses'=>'App\Http\Controllers\OMSControllers\LeaveController@edit'
    ]);
    Route::resource('leaves',LeaveController::class,['except'=>'show','edit']);
    //end

    // EmployeeLeave
    Route::get('/leaveRequestForm/{date}',[LeaveController::class,'addNew']);
    // end

    // leaderLeave
    Route::get('/leader/leaveRecord',[LeaderLeaveController::class,'viewLeave']);
    Route::get('/leader/leaveStatus/{id}/{status}/{date}/{filtering}',[LeaderLeaveController::class,'changeStatus']);
    Route::get('/leader/leaveRecord/filterLeave/{filtering}/{date}',[LeaderLeaveController::class,'filterLeave']);
    // end
});

// account
   Route::post('/changepassword/{id}',[AccountController::class,'changePassword']);
// end

//attendance
    Route::post('/attendanceform',[AttendanceController::class, 'store']);
    Route::post('/update/{id}',[AttendanceController::class, 'update']);
    Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy']);
// end

// EmployeeLeave
    Route::post('/leaveRecord/searchLeave',[LeaveController::class,'searchLeave']);
// end

// leaderLeave
    Route::post('/leader/leaveRecord/searchLeave',[LeaderLeaveController::class,'findLeave']);
// end
