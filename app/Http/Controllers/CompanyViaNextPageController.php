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
    //addpage
    public function addPage()
    {
        return view('NextPage.AddNextPageVersion');
    }
    //add new record
    public function addFunction(Request $request)
    {        
        try{
            //create new record
            Company::create($request->all());            
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
    //Update page
    public function updatePage($id)
    {                   
        $company = Company::where(['id' => $id])->first();        
        return view('NextPage.UpdateNextPageVersion', compact('company'));
    }
    //update record
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
    //delete page
    public function deletePage($id)
    {                   
        $company = Company::where(['id' => $id])->first();        
        return view('NextPage.DeleteNextPageVersion', compact('company'));
    }
    //delete record
    public function delete($id)
    {        
        //delete record
        $company = Company::where(['id' => $id])->delete(); 
        //call all company data
        $company = Company::all();
        //display return
        return view('NextPage.CompanyNextPageVersion', compact('company'));
    }    
}
