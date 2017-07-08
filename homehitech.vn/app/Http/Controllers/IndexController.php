<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Banner;
use Cart;
use App\News;
class IndexController extends Controller
{
    public function getIndex(){  
    	$category			=	Category::all();
        $menu               =   Category::where('parent_id',0)->get();
        $product            =   Product::where('delete',0)->take(20)->orderBy('id','asc')->get();
    	$banner 			= 	Banner::all();
        $total              =   Cart::getTotalQuantity();
        $news               =   News::paginate(10);
    	return view('layouts.main-content',compact('category','menu','product','banner','total','news'));
    }

    public function postSearch(Request $request){
    	$product	=	Product::where([['category_id',$request->id],['delete',0]])->get();
    	return response()->json(array('product'=>$product));
    }
}