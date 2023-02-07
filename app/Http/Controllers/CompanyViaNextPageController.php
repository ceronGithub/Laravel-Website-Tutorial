<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyViaNextPageController extends Controller
{
    /**
     * Create a new controller instance.
     * prevent user from going in here. w/o proper login 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //main index
    public function index()
    {
        $company = Company::all();
        return view('NextPage.CompanyNextPageVersion', compact('company'));
    }
    //view method
    public function show($id)
    {
        $company = Company::where(['id' => $id])->first();        
        return view('NextPage.ViewNextPageVersion', compact('company'));
    }
}
