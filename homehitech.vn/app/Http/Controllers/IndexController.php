<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Banner;
use App\News;
use App\Contact;
use Cart;

class IndexController extends Controller
{
    public function getIndex(){  
        $category           =   Category::all();
    	$contact			=	Contact::all()->first();
        $menu               =   Category::where('parent_id',0)->get();
        $product            =   Product::where('delete',0)->take(24)->orderBy('id','asc')->get();
    	$banner 			= 	Banner::all();
        $total              =   Cart::getTotalQuantity();
        $news               =   News::paginate(10);
    	return view('layouts.main-content',compact('category','contact','menu','product','banner','total','news'));
    }

    public function postSearch(Request $request){
    	$product	=	Product::where([['category_id',$request->id],['delete',0]])->get();

    	if($product){
            return response()->json(array(
                            'response' => true,
                            'product'  => $product
                            ));   
        }else{
            return response()->json(array(
                            'response' => false
                            ));
        }
    }
    public function postSearchDetail(Request $request){
        $product    =   Product::where([['id',$request->id],['delete',0]])->get()->first();

        if($product){
            return response()->json(array(
                            'response' => true,
                            'product'  => $product
                            ));   
        }else{
            return response()->json(array(
                            'response' => false
                            ));
        }
        
    }

    public function getProduct($category){
        $categoryCheck    =   Category::where([['slug',$category],['delete',0]])->get()->first();
        $contact     =   Contact::all()->first();
        $category           =   Category::all();
        $contact            =   Contact::all()->first();
        $menu               =   Category::where('parent_id',0)->get();
        $banner             =   Banner::all();
        $total              =   Cart::getTotalQuantity();
        $news               =   News::paginate(10);
        $product     = array();
        if($category){
            $product    =   Product::where([['category_id',$categoryCheck->id],['delete',0]])->get();
                        
        }
        return view('layouts.product-content',compact('category','contact','menu','product','banner','total','news'));
    }
}