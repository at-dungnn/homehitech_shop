<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function Index(){
    	return view('backend.login');
    }
    public function getReset(){
    	return view('backend.reset-password');
    }
}
