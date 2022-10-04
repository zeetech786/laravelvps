<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YajraController;
use App\Http\Controllers\YajraDataTableController;
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
    return view('welcome');
});
//Logout Route
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Login Route
Route::get('login', '\App\Http\Controllers\Auth\LoginController@login');
Route::resource('companies', CompanyController::class);
Route::get('users/excel',[ExcelImportController::class,'index']);
Route::post('users/excel',[ExcelImportController::class,'store']);
Route::get('users/sendmail/{id?}',[ExcelImportController::class,'sendMail']);
//Yajra Data Table
//Route::get('yajra/{id}',[YajraDataTableController::class,'index']);
//Route::resource('yajra', YajraDataTableController::class);
Route::resource('yajra', YajraController::class);

Route::get('/state_load',[YajraController::class,'dataStore']);
Route::get('/state_save',[YajraController::class,'dataStore']);

Route::view('dashboard','layouts.dashboard')->name('dashboard.show');
Route::view('/master','layouts.master');
Route::view('/test','test');
Route::get('/export', [CompanyController::class, 'export']);
//Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
