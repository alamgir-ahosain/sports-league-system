<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TMController extends Controller
{
    
    public function  TMindex(){
        return view('TM/TMIndex');
    }
}
