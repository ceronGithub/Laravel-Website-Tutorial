<?php

namespace App\Http\Controllers\FishController;

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
