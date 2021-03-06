<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
     function login(){
    	return view('backend.login');
    }
    // Submit Login
    function submit_login(Request $request){
    	$request->validate([
    		'username'=>'required',
    		'password'=>'required'
    	]);

    	$userCheck=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
    	if($userCheck>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>$request->password])->first();
            session(['adminData'=>$adminData]);
    		return redirect('admin/dashboard');
    	}else{
    		return redirect('admin/login')->with('error','Invalid username/password!!');
    	}

    }
    // Dashboard
    function dashboard(){      
    	return view('backend.dashboard');
    }
}
