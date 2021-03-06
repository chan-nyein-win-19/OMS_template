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
use App\Http\Controllers\OMSControllers\PcrentController;
use App\Http\Controllers\OMSControllers\PcPurchaseController;
use App\Http\Controllers\OMSControllers\CategoryController;
use App\Http\Controllers\OMSControllers\SubcategoryController;
use App\Http\Controllers\OMSControllers\AllAssetsController;
use App\Http\Controllers\OMSControllers\PurchaseController;
use App\Http\Controllers\OMSControllers\OtherAssetController;
use App\Http\Controllers\OMSControllers\SubbrandController;

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
Route::middleware(['checkRole:Admin'])->group(function(){
        // purchaseforotherasset
        Route::resource('otherpurchase',PurchaseController::class); 
        Route::resource('otherAsset',OtherAssetController::class);
        Route::get('/findCategory/{id}',[PurchaseController::class,'findCategory']);
        Route::get('/findBrand/{id}',[PurchaseController::class,'findBrand']);
    //end

    //PCPurchase
        Route::resource('pcpurchase',PcPurchaseController::class);
    //end

    //PcRent
        Route::resource('pcrent',PcrentController::class);
        Route::get('/employee/{id}',[PcrentController::class,'employee']);
    //end

    //PC
        Route::resource('pc',PcController::class);
    //end

    // PC
        Route::resource('pcpurchase',PcPurchaseController::class);
    // end

    // brand
        Route::resource('brands',BrandController::class);
    // end

    //subbrand
    Route::resource('subbrands',SubbrandController::class);
    //end

    // category
        Route::resource('categories',CategoryController::class);
    // end
    
    // subCategory
        Route::resource('subCategory',SubcategoryController::class);
    // end
    

    //allAssetLists
        Route::get('/allAssetLists',[AllAssetsController::class,'showAllAssets']);
        Route::get('/allAssetList/updateOthersPrice',[AllAssetsController::class,'currentOthersPrice']);
        Route::get('/allAssetList/updatePcPrice',[AllAssetsController::class,'currentPcPrice']);
    //end
    // user
     Route::resource('users',UserController::class);
     // end
     // announcement
    Route::resource('announcements',AnnouncementController::class);
    // end
});

Route::group(['middleware'=>['checkRole:Leader|Sensei']],function(){
     // leaderLeave
     Route::get('/leader/leaveRecord',[LeaderLeaveController::class,'viewLeave']);
     Route::get('/leader/leaveStatus/{id}/{status}/{date}/{filtering}',[LeaderLeaveController::class,'changeStatus']);
     Route::get('/leader/leaveRecord/filterLeave/{filtering}/{date}',[LeaderLeaveController::class,'filterLeave']);
     Route::get('/leader/leaveRecord/searchLeave',[LeaderLeaveController::class,'viewLeave']);
     Route::post('/leader/leaveRecord/searchLeave',[LeaderLeaveController::class,'findLeave']);
 // end
});

Route::group(['middleware'=>['checkRole:Employee']],function(){
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
// attendance
    Route::resource('attendance',AttendanceController::class);
    Route::post('/update/{id}',[AttendanceController::class, 'update']);
// end
    
});

Route::middleware(['auth'])->group(function(){
    
    // login
        Route::get('/successlogin',[AuthController::class, 'successlogin']);
    // end
    //account
        Route::resource('accounts',AccountController::class);
        Route::get('/changepassword/{id}',[AccountController::class,'editPassword']);
        Route::post('/changepassword/{id}',[AccountController::class,'changePassword']);
    // end
    //attendance
    Route::get('/attendanceList',[AttendanceController::class, 'showAttendance']);
    //end

    Route::get('/announceDetails/{id}',[AnnouncementController::class, 'show']);
    
});



