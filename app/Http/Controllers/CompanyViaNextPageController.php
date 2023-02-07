<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Throwable;

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
    //showUpdatepage
    public function updatePage($id)
    {                   
        $company = Company::where(['id' => $id])->first();        
        return view('NextPage.UpdateNextPageVersion', compact('company'));
    }
    public function update(Request $request)
    {        
        try{
            //check if Id exist
            $company = Company::where(['id' => $request->input('id')])->first(); 
            //if existing, update all rows
            $company->update($request->all());
            //call all company data
            $company = Company::all();
            //display return
            return view('NextPage.CompanyNextPageVersion', compact('company'));
        }  
        catch(Throwable $e)
        {
            $company = Company::where(['id' => $request->input('id')])->first();        
            return view('NextPage.UpdateNextPageVersion', compact('company'));
        }     
    }
}
