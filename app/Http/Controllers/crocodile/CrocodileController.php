<?php

namespace App\Http\Controllers\crocodile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrocodileController extends Controller
{
    //
    public function index()
    {
        return view('Crocodile.CrocodileIndex');
    }
}
