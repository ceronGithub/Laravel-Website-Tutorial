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
//via modal
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/companyViaModal', [App\Http\Controllers\CompanyViaModalController::class, 'index'])->name('companyModalVer');
Route::post('/companyViaModal/update', [App\Http\Controllers\CompanyViaModalController::class, 'update'])->name('updateCompanyModalVer');
Route::post('/companyViaModal/store', [App\Http\Controllers\CompanyViaModalController::class, 'addNewCompany'])->name('addNewCompanyModalVer');

//via next page
Route::get('/companyViaNextPage', [App\Http\Controllers\CompanyViaNextpageController::class, 'index'])->name('companyNextPageVer');
//add page
Route::get('/companyViaNextPage/NewRecordPage', [App\Http\Controllers\CompanyViaNextpageController::class, 'addPage'])->name('companyNextPageAddVer');
Route::get('/companyViaNextPage/storeFunc', [App\Http\Controllers\CompanyViaNextpageController::class, 'store'])->name('companyNextPageAddFuncVer');
//view page
Route::get('/companyViaNextPage/ViewCompanyDetails/{id}', [App\Http\Controllers\CompanyViaNextpageController::class, 'view'])->name('companyNextPageViewVer');
//update
Route::get('/companyViaNextPage/EditPage/{id}', [App\Http\Controllers\CompanyViaNextpageController::class, 'editPage'])->name('companyNextPageEditVer');
Route::get('/companyViaNextPage/editFunc', [App\Http\Controllers\CompanyViaNextpageController::class, 'edit'])->name('companyNextPageEditFuncVer');
