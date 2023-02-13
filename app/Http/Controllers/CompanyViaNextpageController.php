<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyViaNextpageController extends Controller
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
        //get company data
        $company = Company::paginate();
        //calling rss/views
        return view('nextpage.CompanyNextPageVersion', compact('company'));
    }   
    public function view($companyID)  
    {
        //check if company is existing, and if existing get data
        $companyDetials = Company::where('id', $companyID)->first();
        //display return 
        return view('nextpage/view', compact('companyDetials'));
    }

    //-----add start
    public function addPage()  
    {
        //display return 
        return view('nextpage/add');
    }   
    public function store(Request $request)  
    {        
        try
        {
            //save data to DB
            Company::create($request->all());
            //flash message
            Session::flash('success', "Table has been updated.");
            //get company data
            $company = Company::paginate();
            //calling rss/views
            return redirect()->route('companyNextPageVer')->with(compact('company'));
        }
        catch(Throwable $e)
        {
            //flash message
            Session::flash('missing', "Add new Record failed. Due to missing information, Please fill-up all information. Thanks");
            //display return 
            return redirect()->route('companyNextPageAddVer');
        }
    }        
    //-----add end

    //-----update start
    public function editPage($companyID)  
    {
        //check if company is existing, and if existing get data
        $companyDetials = Company::where('id', $companyID)->first();
        //display return 
        return view('nextpage/edit', compact('companyDetials'));
    } 
    public function edit(Request $request)  
    {
        $updateID = Company::where('id', $request->input('companyID'))->first();
        try
        {
            //find record data, based on fetch ID        
            $updateID->name = $request->input('name');
            $updateID->product = $request->input('product');
            $updateID->country = $request->input('country');
            $updateID->history = $request->input('history');
            if($request->input('img') != null)
            {
                $updateID->img = $request->input('img'); 
                //save changes
                $updateID->save();
            }         
            else
            {
                //save changes
                $updateID->save();
            }      
            //flash message
            Session::flash('success', "Table has been updated.");            
            //get company data
            $company = Company::paginate();
            //calling rss/views
            return redirect()->route('companyNextPageVer')->with(compact('company'));
        }
        catch(Throwable $e)
        {
            //flash message
            Session::flash('missing', "Update Unsuccessful. Due to missing information, Please fill-up all information. Thanks");            
            //calling rss/views
            //fix missing parameter add $request->input('companyID')
            return redirect()->route('companyNextPageEditVer', $request->input('companyID'));
        }        
    }      
    //-----update end

    //-----delete start
    public function deletePage($companyID)  
    {
        //check if company is existing, and if existing get data
        $companyDetials = Company::where('id', $companyID)->first();
        //display return 
        return view('nextpage/delete', compact('companyDetials'));
    } 
    public function delete(Request $request)  
    {            
        try
        {
            //delete record from Database
            $updateID = Company::where('id', $request->input('companyID'))->delete();
            //flash message
            Session::flash('success', "Record deletion successful.");            
            //get company data
            $company = Company::paginate();
            //calling rss/views
            return redirect()->route('companyNextPageVer')->with(compact('company'));
        }
        catch(Throwable $e)
        {
            //flash message
            Session::flash('missing', "Please Try Again");            
            //calling rss/views            
            return redirect()->route('companyNextPageVer')->with(compact('company'));
        }        
    }        
    //-----delete end
}
