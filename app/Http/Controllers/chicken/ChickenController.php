<?php

namespace App\Http\Controllers\chicken;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChickenController extends Controller
{
    //
    public function index()
    {
        return view('Chicken.Index');
    }
}
