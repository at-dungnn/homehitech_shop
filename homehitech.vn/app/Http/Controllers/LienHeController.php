<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Contact;
class LienHeController extends Controller
{
    public function getIndex(){
    	$contact            =   Contact::all();
    	$total              =   Cart::getTotalQuantity();
    	return view('layouts.lienhe-content',compact('total','contact'));
    }
}