<?php

namespace App\Http\Controllers\modal;

use Throwable;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Product;

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
    public function show($ID,$product)
    {                       
        $products = Product::where('company_id', $ID)->get();        
        $companyData = Company::where('id', $ID)->first();
        switch($product)
        {
            case "Pig":            
                return view('Pig.Pigindex', compact('products', 'companyData'));
                break;
            case "Cow":
                return view('Cow.Cowindex', compact('products', 'companyData'));
                break;
            case "Duck":
                return view('Duck.Duckindex', compact('products', 'companyData'));
                break;    
            case "Chicken":
                return view('Chicken.index', compact('products', 'companyData'));
                break;   
            case "Fish":                
                return view('Fish.Fishindex', compact('products', 'companyData'));
                break; 
            case "Rabbit":
                return view('Rabbit.Rabbitindex', compact('products', 'companyData'));
                break; 
            case "Crocodile":
                return view('Crocodile.Crocodileindex', compact('products', 'companyData'));
                break;

            default:
                return view('companyModalVer');
        }
    }
    //--------- show end
}
