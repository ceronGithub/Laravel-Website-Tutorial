<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/company', [App\Http\Controllers\CompanyViaModalController::class, 'index'])->name('companyModalVer');
Route::post('/company/update', [App\Http\Controllers\CompanyViaModalController::class, 'update'])->name('updateCompanyModalVer');
Route::post('/company/store', [App\Http\Controllers\CompanyViaModalController::class, 'addNewCompany'])->name('addNewCompanyModalVer');
Route::post('/company/delete', [App\Http\Controllers\CompanyViaModalController::class, 'deleteRecord'])->name('removeCompanyModalVer');
