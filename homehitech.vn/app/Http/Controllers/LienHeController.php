<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Contact;
use App\Category;
class LienHeController extends Controller
{
    public function getIndex(){
    	// $contact            =   Contact::all();
    	$total              =   Cart::getTotalQuantity();
    	$contact			=	Contact::all()->first();
    	$category           =   Category::all();
    	return view('layouts.lienhe-content',compact('total','contact','category'));
    }
}