<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserroleController extends Controller
{
    public function viewrole()
    {    
        return view('role');
    }

    public function createrole()
    {       
        return view('createrole');
    }
}
