<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Category;
use App\User;
use App\News;
use App\Cskh;
use App\Order;
class DashboardControler extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
    public function Index(){
    	$product = Product::where('delete','0')->count();
    	$category= Category::where('delete','0')->count();
    	$user    = User::all()->count();
    	$news    = News::all()->count();
    	$cskh    = Cskh::all()->count();
    	$order   = Order::where('paid','0')->count();
    	return view('backend.dashboard',[
    						'isActive'	=>'overview'
				    		,'product'	=>$product
				    		,'category'	=>$category
				    		,'user'		=>$user
				    		,'news'		=>$news
				    		,'cskh'		=>$cskh
				    		,'order'	=>$order
				    		]);
    }
}
