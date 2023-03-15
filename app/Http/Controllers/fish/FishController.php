<?php

namespace App\Http\Controllers\fish;

use Whoops\Run;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class FishController extends Controller
{
    //
    public function index()
    {
        return view('Fish.FishIndex');
    }
    public function create(Request $request)
    {
        //dd($request);
        $companyId = $request->input('company_id');
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        
        //Product::create($request->all());
        $products = Product::where('company_id', $companyId)->get();
        $companyData = Company::where('id', $companyId)->first();
        //returns to fish page, but everytime the page is refreshed. the last data created, will duplicate.
        //return view('Fish.Fishindex', compact('products', 'companyData')); 
        //return back to previous page
        return back();
    }
}
