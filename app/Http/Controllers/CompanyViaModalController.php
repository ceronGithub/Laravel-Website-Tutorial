<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyViaModalController extends Controller
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
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$company = Company::paginate(5);
        $company = Company::all();
        return view('CompanyModalVersion', compact('company'));
    } 
    //remove record
    public function deleteRecord(Request $request)
    {
        //delete record, based of passed ID
        Company::where(['id'=> $request->input('ID')])->delete();
        //flash message
        Session::flash('success', "Record Has Been successfully deleted");
        //display return 
        return redirect()->route('companyModalVer');
    }
    //Add new record
    public function addNewCompany(Request $request)
    {
        //save data to DB
        Company::create($request->all());
        //flash message
        Session::flash('success', "Record Has Been saved");        
        //display return
        return redirect()->route('companyModalVer');
    }
    //update
    public function update(Request $request)
    {
        //find record data, based on fetch ID
        $updateID = Company::where(['id'=> $request->input('ID')])->first();
        //apply changes
        $updateID->name = $request->input('updateName');
        $updateID->product = $request->input('updateProduct');
        $updateID->country = $request->input('updateCountry');
        $updateID->history = $request->input('updateHistory');
        //save changes
        $updateID->save();
        //display return
        //return view('companyModalVer', compact('company'));        
        return redirect()->route('companyModalVer');
    }   
}
