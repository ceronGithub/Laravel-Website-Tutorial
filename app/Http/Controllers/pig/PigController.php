<?php

namespace App\Http\Controllers\pig;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PigController extends Controller
{
    //
    public function index()
    {
        return view('Pig.PigIndex');
    }    
}
