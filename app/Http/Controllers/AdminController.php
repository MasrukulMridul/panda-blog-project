<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Login View
    function login(){
      return view('backend.login');
    }
}
