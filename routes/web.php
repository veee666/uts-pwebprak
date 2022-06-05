<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', [MemberController::class, 'landing']);
Route::get('/about',[MemberController::class, 'about']);
Route::get('/service', [MemberController::class, 'services']);

Route::get('/register',[AuthController::class, 'show_regist'])->name('showRegist');
Route::post('/register',[AuthController::class, 'register'])->name('client.register');

Route::get('/login',[AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login',[AuthController::class, 'login'])->name('auth.login');

Route::get('/logout', [AuthController::class,'logout'])->middleware('auth')->name('auth.logout');

Route::prefix('dashboard')->group(function(){
    Route::get('/',[MemberController::class, 'dashboard'])->name('dashboard')->middleware(['auth']);

    Route::get('/login',[AuthController::class, 'loginAdmin'])->name('loginAdmin');
    Route::post('/login',[AuthController::class, 'authLoginAdmin'])->name('auth.loginAdmin');

    Route::get('/addMember', [MemberController::class, 'form']);
    Route::post('/addMember', [MemberController::class, 'store']);

    Route::prefix('member')->group(function(){
        
        Route::get('/edit/{id}',[MemberController::class, 'edit']);
        Route::post('/edit/{id}', [MemberController::class, 'update']);

        Route::get('/del/{id}', [MemberController::class, 'delete']);         
    });

});

