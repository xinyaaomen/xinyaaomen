<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class DluController extends Controller
{
    public function dludo(Request $request){
    	$user = $request->except('_token');
    	//dd($user);
    	$user['password'] = md5(md5($user['password']));
    	//dd($user);
    	$admin = Admin::where($user)->first();
    	//dd($admin);
 	   	if($admin){
    		session(['admin'=>$admin]);
    		$request->session()->save();
    		return redirect('/wenzhang');
    	}
	}
}