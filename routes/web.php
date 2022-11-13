<?php

use App\Http\Controllers\mayor\PurchaseRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageRequest;
use App\Http\Controllers\mayor\airController;
use App\Http\Controllers\mayor\AqController;
use App\Http\Controllers\mayor\PurchaseOrderController;
use App\Http\Controllers\mayor\raisController;
use App\Http\Controllers\RpqController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('home');

// Route::get('/user_logout', [HomeController::class,'user_logout'])->name('user.logout');
Auth::routes();

Route::group(['prefix'=> 'login','as'=>'login.'], function () {
    Route::get('/mayor', [HomeController::class, 'loginMayor'])->name('loginMayor');
    Route::get('/budget', [HomeController::class, 'loginBudget'])->name('loginBudget');
    Route::get('/accounting', [HomeController::class, 'loginAccounting'])->name('loginAccounting');
    Route::get('/treasury', [HomeController::class, 'loginTreasury'])->name('loginTreasury');
    Route::get('/admin', [HomeController::class, 'loginAdmin'])->name('loginAdmin');
});

Route::group(['middleware'=>'auth'], function () {
    Route::get('/home', [HomeController::class,'index'])->name('index');
    Route::get('/document', [HomeController::class,'documentStatus'])->name('documentStatus');

    Route::resource('/purchaseRequest', PurchaseRequestController::class);
    Route::get('/purchaseRequest/{id}/reject', [PurchaseRequestController::class, 'reject'])->name('purchaseRequest.reject');
    Route::get('/purchaseRequest/{id}/accept', [PurchaseRequestController::class, 'accept'])->name('purchaseRequest.accept');
    Route::resource('/purchaseOrder', PurchaseOrderController::class);
    Route::resource('/air', airController::class);
    Route::resource('/rais', raisController::class);
    Route::resource('/manageR', ManageRequest::class);

    Route::get('/user/changepassword',[userController::class,'edit'])->name('user.edit');
    Route::patch('/user/{id}/password',[userController::class,'update'])->name('user.update');

    Route::group(['prefix'=> 'mayor','as'=>'mayor.','middleware'=>'mayor'], function () {
        Route::resource('/rpq', RpqController::class);
        Route::resource('/aq', AqController::class);
    });
    Route::group(['prefix'=> 'budget','as'=>'budget.'], function () {
    });
    Route::group(['prefix'=> 'accounting','as'=>'accounting.'], function () {
    });
    Route::group(['prefix'=> 'treasury','as'=>'treasury.'], function () {
    });
    Route::group(['prefix'=> 'admin','as'=>'admin.'], function () {
        Route::resource('/user', userController::class);
    });
});
