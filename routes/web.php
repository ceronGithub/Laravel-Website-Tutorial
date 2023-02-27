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
Route::get('/companyViaModal', [App\Http\Controllers\modal\CompanyViaModalController::class, 'index'])->name('companyModalVer');
Route::post('/companyViaModal/store', [App\Http\Controllers\modal\CompanyViaModalController::class, 'addNewCompany'])->name('addNewCompanyModalVer');
Route::post('/companyViaModal/delete', [App\Http\Controllers\modal\CompanyViaModalController::class, 'delete'])->name('deleteCompanyModalVer');
Route::post('/companyViaModal/update', [App\Http\Controllers\modal\CompanyViaModalController::class, 'update'])->name('updateCompanyModalVer');
Route::get('/companyViaModal/{id}', [App\Http\Controllers\modal\CompanyViaModalController::class, 'show'])->name('showCompanyModalVer');


//via next page
Route::get('/companyViaNextPage', [App\Http\Controllers\nextpage\CompanyViaNextpageController::class, 'index'])->name('companyNextPageVer');
//----------- add start
Route::get('/companyViaNextPage/NewRecordPage', [App\Http\Controllers\nextpage\CompanyViaNextpageController::class, 'addPage'])->name('companyNextPageAddVer');
Route::get('/companyViaNextPage/storeFunc', [App\Http\Controllers\nextpage\CompanyViaNextpageController::class, 'store'])->name('companyNextPageAddFuncVer');
//----------- add end
//----------- view start
Route::get('/companyViaNextPage/ViewCompanyDetails/{id}', [App\Http\Controllers\nextpage\CompanyViaNextpageController::class, 'view'])->name('companyNextPageViewVer');
//----------- view end
//----------- edit start
Route::get('/companyViaNextPage/EditPage/{id}', [App\Http\Controllers\nextpage\CompanyViaNextpageController::class, 'editPage'])->name('companyNextPageEditVer');
Route::get('/companyViaNextPage/editFunc', [App\Http\Controllers\nextpage\CompanyViaNextpageController::class, 'edit'])->name('companyNextPageEditFuncVer');
//----------- edit end
//----------- delete start
Route::get('/companyViaNextPage/DeletePage/{id}', [App\Http\Controllers\nextpage\CompanyViaNextpageController::class, 'deletePage'])->name('companyNextPageDeleteVer');
Route::get('/companyViaNextPage/deleteFunc', [App\Http\Controllers\nextpage\CompanyViaNextpageController::class, 'delete'])->name('companyNextPageDeleteFuncVer');
//----------- delete end

//product pages 
Route::get('/ChickenPage', [App\Http\Controllers\chicken\ChickenController::class, 'index'])->name('Chicken.index');


