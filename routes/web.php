<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubsController;
use App\Http\Controllers\MemberController;

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

Route::get('/', [MemberController::class, 'landing'])->name('landing');
Route::get('/about',[MemberController::class, 'about']);
Route::get('/service', [MemberController::class, 'services']);

Route::get('/subscription/{id}',[SubsController::class,'index'])->name('form.subs')->middleware('auth');
Route::post('/subscription/{id}',[SubsController::class,'subscribe'])->name('subscribe');

Route::get('/register',[AuthController::class, 'show_regist'])->name('showRegist');
Route::post('/register',[AuthController::class, 'register'])->name('client.register');

Route::get('/login',[AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login',[AuthController::class, 'login'])->name('auth.login');

Route::get('/logout', [AuthController::class,'logout'])->middleware('auth')->name('auth.logout');

Route::prefix('/{id}')->group (function(){
    Route::get('/dashboard',[MemberController::class, 'dashboardUser'])->name('dashboard-user')->middleware(['auth']);

    Route::get('/edit-profile',[MemberController::class, 'editProfile'])->name('edit-profile')->middleware(['auth']);
    Route::delete('/stop-subscription',[MemberController::class, 'stopSubscription'])->name('stop_subscription')->middleware(['auth']);
});

Route::get('/dashboard-admin/login',[AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/dashboard-admin/login',[AuthController::class, 'login'])->name('auth.loginAdmin')->middleware('admin');

Route::group(['prefix' => 'dashboard-admin', 'middleware'=>'auth_admin'], function(){
    Route::get('/',[MemberController::class, 'dashboardAdmin'])->name('dashboard-admin')->middleware(['auth_admin']);

    Route::get('/addMember', [MemberController::class, 'form']);
    Route::post('/addMember', [MemberController::class, 'store']);

    Route::get('/subscriptions', [SubsController::class, 'show'])->name('listSubs');

    Route::get('/addSubs', [SubsController::class, 'showAddSubs']);
    Route::post('/addSubs',[SubsController::class, 'addSubs']);

    Route::prefix('subscription')->group(function(){
        Route::get('/edit/{id}',[SubsController::class, 'edit']);
        Route::post('/edit/{id}', [SubsController::class, 'update'])->name('admin.editSubs');

        // Route::get('/del/{id}', [SubsController::class, 'delete']);
        Route::post('/del', [SubsController::class, 'delete'])->name('admin.delSubs'); 
    });

    Route::prefix('member')->group(function(){
        
        Route::get('/edit/{id}',[MemberController::class, 'edit']);
        Route::post('/edit/{id}', [MemberController::class, 'update'])->name('editMember');

        // Route::get('/del/{id}', [MemberController::class, 'delete']);
        Route::post('/del', [MemberController::class, 'delete'])->name('admin.delMember');        
    });

});