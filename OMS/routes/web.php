<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OMSControllers\AuthController;
use App\Http\Controllers\OMSControllers\AnnouncementController;
use App\Http\Controllers\OMSControllers\AccountController;
use App\Http\Controllers\OMSControllers\EmailSendController;
use App\Http\Controllers\OMSControllers\ResetPasswordController;
use App\Http\Controllers\OMSControllers\UserController;
use App\Http\Controllers\OMSControllers\LeaveController;
use App\Http\Controllers\OMSControllers\LeaderLeaveController;
use App\Http\Controllers\OMSControllers\AttendanceController;
use App\Http\Controllers\OMSControllers\PcController;
use App\Http\Controllers\OMSControllers\BrandController;
use App\Http\Controllers\OMSControllers\SubcategoryController;
use App\Http\Controllers\OMSControllers\CategoryController;
use App\Http\Controllers\OMSControllers\PcPurchaseController;

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
    
    // login
        Route::get('/successlogin',[AuthController::class, 'successlogin']);
    // end
      
    // user
        Route::resource('users',UserController::class);
    // end

    // announcement
        Route::resource('announcements',AnnouncementController::class);
    // end

    // account
        Route::resource('accounts',AccountController::class);
        Route::get('/changepassword/{id}',[AccountController::class,'editPassword']);
        Route::post('/changepassword/{id}',[AccountController::class,'changePassword']);
    // end

    // attendance
        Route::resource('attendance',AttendanceController::class);
        Route::post('/update/{id}',[AttendanceController::class, 'update']);
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
    // end

    // EmployeeLeave
        Route::get('/leaveRequestForm/{date}',[LeaveController::class,'addNew']);
        Route::post('/leaveRecord/searchLeave',[LeaveController::class,'searchLeave']);
        Route::get('/leaveRecord/searchLeave',[LeaveController::class,'show']);
    // end

    // leaderLeave
        Route::get('/leader/leaveRecord',[LeaderLeaveController::class,'viewLeave']);
        Route::get('/leader/leaveStatus/{id}/{status}/{date}/{filtering}',[LeaderLeaveController::class,'changeStatus']);
        Route::get('/leader/leaveRecord/filterLeave/{filtering}/{date}',[LeaderLeaveController::class,'filterLeave']);
        Route::get('/leader/leaveRecord/searchLeave',[LeaderLeaveController::class,'findLeave']);
        Route::post('/leader/leaveRecord/searchLeave',[LeaderLeaveController::class,'viewLeave']);
    // end

    //PC
        Route::resource('purchase',PcPurchaseController::class);
    //end

    // brand
        Route::resource('brands',BrandController::class);
    //end

    // category
        Route::resource('categories',CategoryController::class);
    // end
    
    // subCategory
        Route::resource('subCategory',SubcategoryController::class);
    //end
});

