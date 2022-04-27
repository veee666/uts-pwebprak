<?php

use Illuminate\Support\Facades\Route;
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

Route::prefix('dashboard')->group(function(){
    Route::get('/',[MemberController::class, 'dashboard']);

    Route::get('/addMember', [MemberController::class, 'form']);
    Route::post('/addMember', [MemberController::class, 'store']);

    Route::prefix('member')->group(function(){
        
        Route::get('/edit/{id}',[MemberController::class, 'edit']);
        Route::post('/edit/{id}', [MemberController::class, 'update']);

        Route::get('/del/{id}', [MemberController::class, 'delete']);         
    });

});

