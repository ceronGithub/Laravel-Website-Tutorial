<?php

namespace App\Http\Controllers\modal;

use Throwable;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

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
        $company = Company::paginate();
        //calling rss/views
        return view('CompanyModalVersion', compact('company'));
    } 
    //--------- addNewCompany start
    public function addNewCompany(Request $request)
    {
        try{
            //flash message
            Session::flash('success', "Table has been Updated. New record has inserted.");  
            //save data to DB
            Company::create($request->all());
            //display return
            return redirect()->route('companyModalVer');
        }
        catch(Throwable $e)
        {
            //flash message
            Session::flash('error', "Please Try again.");  
            //display return
            return redirect()->route('companyModalVer');
        }
    }
    //--------- addNewCompany end
    //--------- update start
    public function update(Request $request)
    {   
    
        try
        {   
                
            /*  
                $updateID = Company::where('id', $request->input('ID'))->first();
                $updateID->fill($request->input())->save();  
                //flash message
                Session::flash('success', "Table has been Updated. Update successful.");              
            */  
                          
            //find record data, based on fetch ID
            $updateID = Company::where('id', $request->input('ID'))->first();
            //apply changes
            $updateID->name = $request->input('updateName');            
            $updateID->country = $request->input('updateCountry');
            $updateID->history = $request->input('updateHistory');
            $updateID->product = $request->input('updateProduct');
            if($request->input('updateImg') != null)
            {
                $updateID->img = $request->input('updateImg');
                //save changes
                $updateID->save();
            }
            else
            {
                //save changes
                $updateID->save();
            }
            //flash message
            Session::flash('success', "Table has been Updated. Update successful.");        
            //get company data
            $company = Company::paginate();            
            //display return
            //return view('companyModalVer', compact('company'));        
            return redirect()->route('companyModalVer');
        }
        catch(Throwable $e)
        {
            //flash message
            Session::flash('missing', "Please try again.");        
            //display return                  
            return redirect()->route('companyModalVer');
        }
    } 
    //--------- update end  
    //--------- delete start
    public function delete(Request $request)
    {
        //find record data, based on fetch ID
        $updateID = Company::where('id', $request->input('ID'))->delete();
        //flash message
        Session::flash('success', "Table has been Updated. data deletion successful.");         
        //get company data
        $company = Company::paginate();
        //display return
        //return view('companyModalVer', compact('company'));        
        return redirect()->route('companyModalVer');
    }     
    //--------- delete end
    //--------- show start
    public function show($id)
    {        
        $checkProduct = Company::where('id', $id)->first(['product'])->product;
        if($checkProduct == 'chicken')
        {
            return view('chicken.index');
        }

    }
    //--------- show end
}
