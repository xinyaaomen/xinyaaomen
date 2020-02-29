<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class DengluController extends Controller
{
    public function dengludo(Request $request){
    	$user = $request->except('_token');
    	dd($user);
    }
}
