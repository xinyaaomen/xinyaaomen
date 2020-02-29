<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
    	//echo "fhm";
    	return view('index');
    }
    public function add(Request $request){
    	$ywl = $request->all();
    	dd($ywl);
    }
}
