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
//view record
Route::get('/CompanyNextPageVersion/view/{id}', [App\Http\Controllers\CompanyViaNextPageController::class, 'show'])->name('viewNextPageVer');
//add new record
Route::get('/CompanyNextPageVersion/addPage', [App\Http\Controllers\CompanyViaNextPageController::class, 'addPage'])->name('addNextPageVer');
Route::post('/CompanyNextPageVersion/addedNewRecord', [App\Http\Controllers\CompanyViaNextPageController::class, 'addFunction'])->name('addFunction');
//update record
Route::get('/CompanyNextPageVersion/updatePage/{id}', [App\Http\Controllers\CompanyViaNextPageController::class, 'updatePage'])->name('editNextPageVer');
Route::post('/CompanyNextPageVersion/update', [App\Http\Controllers\CompanyViaNextPageController::class, 'update'])->name('updateFunction');
//delete record
Route::get('/CompanyNextPageVersion/deletePage/{id}', [App\Http\Controllers\CompanyViaNextPageController::class, 'deletePage'])->name('deleteNextPageVer');
Route::post('/CompanyNextPageVersion/delete/{id}', [App\Http\Controllers\CompanyViaNextPageController::class, 'delete'])->name('deleteFunction');