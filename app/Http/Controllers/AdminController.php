<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admindo(){
    	//echo "men";
    	return view('admindo');
    }
    public function nl(Request $request){
    	$xym = $request->all();
    	dd($xym);
    }
}
