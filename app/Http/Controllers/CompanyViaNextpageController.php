<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

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
        $company = Company::paginate(5);
        //calling rss/views
        return view('CompanyNextPageVersion', compact('company'));
    }     
}
