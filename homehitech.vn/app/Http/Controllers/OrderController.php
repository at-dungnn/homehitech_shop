<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session,Auth,Cart;
class OrderController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	public function Index() {
		return view('backend.order.order',['isActive'=>'order']);
	}
}