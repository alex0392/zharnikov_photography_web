<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class mainControler extends Controller
{
    public function index()
    {
    	//$data=[]
    	return view('home');
    }
    public function portfolio()
    {
    	return view('template');
    }  
}
