<?php

namespace App\Http\Controllers\cow;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CowController extends Controller
{
    //
    public function index()
    {
        return view('Cow.CowIndex');
    }
}
