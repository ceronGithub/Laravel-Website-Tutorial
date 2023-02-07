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
//modal
Route::get('/CompanyModalVersion', [App\Http\Controllers\CompanyViaModalController::class, 'index'])->name('companyModalVer');
Route::post('/CompanyModalVersion/update', [App\Http\Controllers\CompanyViaModalController::class, 'update'])->name('updateCompanyModalVer');
Route::post('/CompanyModalVersion/store', [App\Http\Controllers\CompanyViaModalController::class, 'addNewCompany'])->name('addNewCompanyModalVer');
Route::post('/CompanyModalVersion/delete', [App\Http\Controllers\CompanyViaModalController::class, 'deleteRecord'])->name('removeCompanyModalVer');
//next page
Route::get('/CompanyNextPageVersion', [App\Http\Controllers\CompanyViaNextPageController::class, 'index'])->name('companyNextPageVer');
Route::get('/CompanyNextPageVersion/view/{id}', [App\Http\Controllers\CompanyViaNextPageController::class, 'show'])->name('viewNextPageVer');
Route::get('/CompanyNextPageVersion/updatePage/{id}', [App\Http\Controllers\CompanyViaNextPageController::class, 'updatePage'])->name('editNextPageVer');
Route::post('/CompanyNextPageVersion/update', [App\Http\Controllers\CompanyViaNextPageController::class, 'update'])->name('updateNextPageVer');
