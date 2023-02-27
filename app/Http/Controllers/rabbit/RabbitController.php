<?php

namespace App\Http\Controllers\rabbit;

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
