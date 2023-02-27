<?php

namespace App\Http\Controllers\RabbitController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RabbitController extends Controller
{
    //
    public function index()
    {
        return view('Rabbit.RabbitIndex');
    }    
}
