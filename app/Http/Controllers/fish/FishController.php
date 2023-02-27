<?php

namespace App\Http\Controllers\fish;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FishController extends Controller
{
    //
    public function index()
    {
        return view('Fish.FishIndex');
    }
}
