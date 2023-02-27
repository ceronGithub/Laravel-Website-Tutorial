<?php

namespace App\Http\Controllers\DuckController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DuckController extends Controller
{
    //
    public function index()
    {
        return view('Duck.DuckIndex');
    }
}
